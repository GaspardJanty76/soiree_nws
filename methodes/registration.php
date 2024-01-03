<?php
require_once 'dbConnect.php';

class UserRegistration
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function registerUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérifiez l'existence des clés dans $_POST avant de les utiliser
            $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : null;
            $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : null;
            $tel = isset($_POST["tel"]) ? $_POST["tel"] : null;
            $mail = isset($_POST["mail"]) ? $_POST["mail"] : null;
            $company = isset($_POST["company"]) ? $_POST["company"] : null;
            $job = isset($_POST["job"]) ? $_POST["job"] : null;

            // Vérifiez que les valeurs ne sont pas nulles avant d'insérer dans la base de données
            if ($firstname !== null && $lastname !== null && $tel !== null && $mail !== null && $company !== null && $job !== null) {
                $this->insertUser($firstname, $lastname, $tel, $mail, $company, $job);
            } else {
                echo "Error: Les champs requis ne sont pas définis.";
            }
        }
    }

    private function insertUser($firstname, $lastname, $tel, $mail, $company, $job)
    {
        $sql = "INSERT INTO registration (firstname, lastname, tel, mail, company, job, confirmed) VALUES (?, ?, ?, ?, ?, ?, 0)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $firstname);
        $stmt->bindParam(2, $lastname);
        $stmt->bindParam(3, $tel);
        $stmt->bindParam(4, $mail);
        $stmt->bindParam(5, $company);
        $stmt->bindParam(6, $job);

        if ($stmt->execute()) {
            header('Location: ../index.php');;
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }

    public function getUnconfirmedUsersCount()
    {
        $sql = "SELECT COUNT(*) FROM registration WHERE confirmed = 0";
        $stmt = $this->pdo->query($sql);
        $count = $stmt->fetchColumn();
        return $count;
    }

}

$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

$userRegistration = new UserRegistration($pdo);
$userRegistration->registerUser();

?>