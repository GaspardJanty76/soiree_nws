<?php
include('../lib/phpqrcode/qrlib.php');
require '../vendor/autoload.php';
require 'dbConnect.php';

$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

            // Vérifiez que les valeurs ne sont pas nulles avant de générer le QR code
            if ($firstname !== null && $lastname !== null && $tel !== null && $mail !== null && $company !== null && $job !== null) {
                $this->insertUser($firstname, $lastname, $tel, $mail, $company, $job);
            } else {
                echo "Error: Les champs requis ne sont pas définis.";
            }
        }
    }

    private function insertUser($firstname, $lastname, $tel, $mail, $company, $job)
    {
        // Ajoutez la logique pour déterminer la valeur de photoConsent
        $photoConsent = isset($_POST["photoConsent"]) ? 0 : 1;

        $sql = "INSERT INTO registrationgasp (firstname, lastname, tel, mail, company, job, photo, registration_date) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $firstname);
        $stmt->bindParam(2, $lastname);
        $stmt->bindParam(3, $tel);
        $stmt->bindParam(4, $mail);
        $stmt->bindParam(5, $company);
        $stmt->bindParam(6, $job);
        $stmt->bindParam(7, $photoConsent);

        if ($stmt->execute()) {
            // Send confirmation email
            $this->sendConfirmationEmail($mail, $firstname);

            header('Location: ../confirmation.php');
            $this->generateQRCode($firstname, $lastname);
            exit();
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }

    private function sendConfirmationEmail($to, $firstname)
    {
        $subject = 'Confirmation d\'inscription à la Nuit de la NWS';
        $message = "Cher(e) $firstname,
        Nous vous confirmons votre inscription à la Nuit de la Normandie Web School.

        Cette soirée d'échanges entre l'école et les professionnels promet des opportunités de collaborations innovantes.
        
        Nous attendons votre venu avec enthousiasme pour partager une soirée mémorable.
        
        Lieu : 
        Là où l'école a fait ses premiers pas, nous nous retrouverons à Seine Innopolis
        72 Rue de la République, Le Petit-Quevilly
        
        Date : 
        18 avril, 18h30
        
        Cordialement,
        
        La Normandie Web School";
        
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('partenairesnws@normandiewebschool.fr')
            ->setPassword('oBLPejhBnatRTAHkRxGG');
    
        $mailer = new Swift_Mailer($transport);
    
        $message = (new Swift_Message($subject))
        ->setFrom(['noreply@nws.com' => 'NWS-La nuit de la NWS'])
        ->setTo([$to])
        ->setBody($message);
    
        $result = $mailer->send($message);
    
        if ($result) {
            echo 'Un e-mail de confirmation a été envoyé à votre adresse.';
        } else {
            echo 'Erreur lors de l\'envoi de l\'e-mail de confirmation.';
        }
    }



    private function generateQRCode($firstname, $lastname)
    {
        // Générer une chaîne contenant le nom et le prénom
        $data = "https://gaspardjanty.xyz/userinfo.php?nom=$lastname&prenom=$firstname";

        // Chemin où sauvegarder le QR code généré
        $qrCodePath = 'qr_codes/' . $firstname . ' ' . $lastname . '_qrcode.png';

        // Générer le QR code
        QRcode::png($data, $qrCodePath);
    }

    public function combineQRcodes()
    {
        // Récupérer tous les fichiers dans le dossier des QR codes
        $qrCodeFiles = glob('qr_codes/*.png');

        // Créer une image combinée au format A4
        $combinedImage = imagecreatetruecolor(794, 1123); // A4 dimensions in pixels (72 dpi)

        $backgroundColor = imagecolorallocate($combinedImage, 255, 255, 255);
        imagefill($combinedImage, 0, 0, $backgroundColor);

        $xOffset = 50; // Ajustez selon vos besoins
        $yOffset = 50; // Ajustez selon vos besoins
        $columnCounter = 0;

        foreach ($qrCodeFiles as $qrCodeFile) {
            $qrCodeImage = imagecreatefrompng($qrCodeFile);
            imagecopy($combinedImage, $qrCodeImage, $xOffset, $yOffset, 0, 0, imagesx($qrCodeImage), imagesy($qrCodeImage));

            // Ajouter le nom et prénom en dessous du QR code
            $font = 'arial.ttf';
            $textColor = imagecolorallocate($combinedImage, 0, 0, 0);
            imagettftext($combinedImage, 12, 0, $xOffset, $yOffset + imagesy($qrCodeImage) + 20, $textColor, $font, basename($qrCodeFile, '_qrcode.png'));

            $yOffset += imagesy($qrCodeImage) + 50;
            $columnCounter++;

            // Déplacer vers la deuxième colonne après chaque deuxième QR code
            if ($columnCounter % 2 == 0) {
                $xOffset += 300; // Ajustez l'espacement entre les colonnes selon vos besoins
                $yOffset = 50; // Réinitialiser l'offset vertical
            }
        }

        // Enregistrer l'image combinée
        imagepng($combinedImage, 'combined_qr_codes.png');
        imagedestroy($combinedImage);
    }
}

$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

$userRegistration = new UserRegistration($pdo);
$userRegistration->registerUser();
$userRegistration->combineQRcodes();
?>
