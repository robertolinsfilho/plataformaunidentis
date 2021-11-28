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

$email = $_GET['email'];
$email2= 'rlins74@gmail.com';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                            // Enable SMTP authentication
    $mail->Username   = 'unidentis.mail@unidentis.com.br';           // SMTP username
    $mail->Password   = 'hiuqxpsyltfpxaep';                      // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                             // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('unidentis.mail@unidentis.com.br', 'Plano Unidentis');
    $mail->addAddress( $email2  , 'Unidentis');     // Add a recipient  
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Plano Unidentis';
    $mail->Body    = '<body style="background-color: #cccccc;border-radius: 5px;"><img style="margin-left: 33%;width:30% "src= "http://unidentisdigital.com.br/assets/img/LOGO.png"><br><h1 style="text-align: center; color: blue;">Proposta De Cancelamento</h1><br><h1 style="text-align: center; color: black;">Email : '.$email.'</h1>
                        </body>';
   

    $mail->send();
    $_SESSION['msg2'] = 'Um de nossos associados entrara em contato com você para efetuar o cancelamento;';
//Resultado aleatório com 8 caraceters
 header('Location: modalgeral');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo 'Erro no Envio do E-mail contate o administrador ';
}
