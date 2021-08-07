<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
session_start();
include_once('conexao.php');

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
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ti@unidentis.com.br';                     // SMTP username
    $mail->Password   = 'unid2019';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ti@unidentis.com.br', 'Plano Unidentis');
    $mail->addAddress( $_SESSION['emaildependente']  , 'Unidentis');     

 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Plano Unidentis';
    $mail->Body    = '<body style="background-color:white;">
    <img style="width:100%"src="http://unidentisdigital.com.br/assets/img/PROPOSTACADASTRADA2.png">                      
    <div style="background-color:#f5f5f5;width:85%;margin-left:8%;height:160px;border-radius:5px">
    <br><h2 style="text-align: center; color: #404bb5;">Para Confirmação de Adição de Dependentes Segue  o Código</h2>
    <h2 style="text-align: center; color: #404bb5;">Código : '.$_SESSION['senhadependente'].' </h2> 
    </div>
    </body>';
   

    $mail->send();
   
header('Location: confirmarcodigo');
 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo 'Erro no Envio do E-mail contate o administrador ';
}
