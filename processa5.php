<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/preloader.css">
    <title>Carregando Fotos</title>
</head>
<body>
    <div id="preloader"></div>
</body>
</html>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
session_start();
include_once('conexao.php');

$email = 'rlins74@gmail.com';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                  // Enable verbose debug output
    $mail->isSMTP();                                        // Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                            // Enable SMTP authentication
    $mail->Username   = 'sendmail@unidentis.com.br';           // SMTP username
    $mail->Password   = 'w&Vbs60j%mYE';                      // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                             // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sendmail@unidentis.com.br', 'Plano Unidentis');
    $mail->addAddress( $email  , 'Unidentis');  // Add a recipient
    // Name is optional
   
    // Content
    $mail->isHTML(true);// Set email format to HTML
    $mail->Subject = 'Plano Unidentis';
    $mail->Body    = '<body style="margin-left:5%;background-color:#f6f6f6;">
   <a href="unidentis.com.br"><img  src="http://unidentisdigital.com.br/assets/img/A1.png"></a>
   <a href="http://unidentis.com.br/carteirinha.php"><img src="http://unidentisdigital.com.br/assets/img/A2.png"></a>
   <a href="http://unidentis.com.br/redecredenciada.php"><img  src="http://unidentisdigital.com.br/assets/img/A3.png"></a>
   <a href="https://play.google.com/store/apps/details?id=br.com.unidentis.associado" ><img  src="http://unidentisdigital.com.br/assets/img/A4.png"></a>
   <a href="https://apps.apple.com/br/app/unidentis-associado/id1368673470"><img  src="http://unidentisdigital.com.br/assets/img/A5.png"></a>
   <a href="https://www.facebook.com/unidentisoficial/"><img  src="http://unidentisdigital.com.br/assets/img/A6.png"></a>
   <a href="https://www.instagram.com/unidentisoficial/"> <img  src="http://unidentisdigital.com.br/assets/img/A7.png" ></a>
   <a href="https://bit.ly/AtendimentoUnidentis"><img src="http://unidentisdigital.com.br/assets/img/A88.png"></a>
   <a href="unidentis.com.br" ><img  src="http://unidentisdigital.com.br/assets/img/A8.png"></a>
  
</body>';
   

    $mail->send();
    $_SESSION['msg1'] = 'Proposta Implantada Com Sucesso';
    echo '<script> location.replace("modalfinal"); </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo 'Erro no Envio do E-mail contate o administrador ';
   
}
