<?php
require_once 'dbConnect.php';

<<<<<<< HEAD
=======
error_reporting(E_ALL);
ini_set('display_errors', 1);

>>>>>>> 2101a81540401559128cb7d6ac8d6dbfee9dd0cc
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
<<<<<<< HEAD
        $sql = "INSERT INTO registration (firstname, lastname, tel, mail, company, job) VALUES (?, ?, ?, ?, ?, ?)";
=======
        $token = bin2hex(random_bytes(32));
    
        $sql = "INSERT INTO registration (firstname, lastname, tel, mail, company, job, token) VALUES (?, ?, ?, ?, ?, ?, ?)";
>>>>>>> 2101a81540401559128cb7d6ac8d6dbfee9dd0cc
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $firstname);
        $stmt->bindParam(2, $lastname);
        $stmt->bindParam(3, $tel);
        $stmt->bindParam(4, $mail);
        $stmt->bindParam(5, $company);
        $stmt->bindParam(6, $job);
<<<<<<< HEAD

        if ($stmt->execute()) {
            header('Location: ../index.php');;
=======
        $stmt->bindParam(7, $token);
    
        if ($stmt->execute()) {
            // Send confirmation email
            $this->sendConfirmationEmail($mail, $token, $firstname);
    
            header('Location: ../index.php');
            exit();
>>>>>>> 2101a81540401559128cb7d6ac8d6dbfee9dd0cc
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
<<<<<<< HEAD
}
=======
    
    private function sendConfirmationEmail($to, $token, $firstname)
    {
        $subject = 'Confirmation d\'inscription à la Nuit des Ambassadeurs';
        $message = "Cher(e) $firstname, \n\n
        Nous vous confirmons votre inscription à la Nuit des Ambassadeurs de la Normandie Web School.\n\n
        Cette soirée d'échanges entre l'école et les professionnels promet des opportunités de collaborations innovantes.\n\n
        Nous attendons votre participation avec enthousiasme pour partager une soirée mémorable.\n\n
        Cordialement,\n\n
        La Normandie Web School";
    
        require '../vendor/autoload.php';
    
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('gogier@normandiewebschool.fr')
            ->setPassword('HJlfval41PsucvOuxxuO');
    
        $mailer = new Swift_Mailer($transport);
    
        $message = (new Swift_Message($subject))
        ->setFrom(['noreply@nws.com' => 'NWS-La nuit de l\'ambassadeur'])
        ->setTo([$to])
        ->setBody($message);
    
        $result = $mailer->send($message);
    
        if ($result) {
            echo 'Un e-mail de confirmation a été envoyé à votre adresse.';
        } else {
            echo 'Erreur lors de l\'envoi de l\'e-mail de confirmation.';
        }
    }
}    
>>>>>>> 2101a81540401559128cb7d6ac8d6dbfee9dd0cc
$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

$userRegistration = new UserRegistration($pdo);
$userRegistration->registerUser();
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 2101a81540401559128cb7d6ac8d6dbfee9dd0cc
