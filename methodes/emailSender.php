<?php

require_once 'dbConnect.php';
$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

$sql = "SELECT * FROM registrationgasp";
$stmt = $pdo->prepare($sql);
$stmt->execute();
    
$inscrits = $stmt->rowCount();

if ($inscrits == 4) {
    sendConfirmationEmail($inscrits);
}

function sendConfirmationEmail($inscrits)
{
    $to = "gaspardjnt@gmail.com";
    $subject = 'Récapitulatif d\'inscriptions à la soirée de la NWS';
    $message = "Bonjour Bleuenn,
    Il y a actuellement $inscrits inscrits sur le site !
    lien vers la partie administration du site pour consulter les personnes inscrites :
    https://nuit.normandiewebschool.fr/admin.php";

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
        ->setUsername('partenairesnws@normandiewebschool.fr')
        ->setPassword('oBLPejhBnatRTAHkRxGG');

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message($subject))
    ->setFrom(['noreply@nws.com' => 'NWS-La nuit de la NWS'])
    ->setTo([$to])
    ->setBody($message);

    $result = $mailer->send($message);
}
?>
