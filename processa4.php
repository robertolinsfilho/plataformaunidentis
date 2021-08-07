<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
session_start();
include_once('conexao.php');

$nome = $_SESSION['nome'];
$telefone = $_SESSION['telefone'];
$email = $_SESSION['email'];
$plano = $_SESSION['plano'];
$cpf = $_SESSION['cpf'];
$link = 'unidentisdigital.com.br/login2';


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
    $mail->addAddress( $email  , 'Unidentis');     // Add a recipient
             // Name is optional
  

 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Plano Unidentis';
    $mail->Body    = '<body style="background-color: #cccccc;border-radius: 5px;"><img style="margin-left: 33%;width:30% "src= "http://unidentisdigital.com.br/assets/img/LOGO.png"><br><h1 style="text-align: center; color: blue;">Proposta Cadastrada</h1><br><h1 style="text-align: center; color: black;">ACESSE NOSSO SISTEMA COM OS DADOS  A SEGUIR PARA CONCLUIR O CADASTRO DA PROPOSTA</h1>
                        <h3 style=" color: blue;">Login: '.$email.'</h3><h3 style="color: blue;">Senha provisoria:'.$_SESSION['senhaemail'].'</h3><h3 style=" color: blue;">Finalize seu plano clicando no link : '.$link.'</h3> </body>';
   

    $mail->send();
    	
//Resultado aleatório com 8 caraceters
 header('Location: http://unidentis.com.br');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo 'Erro no Envio do E-mail contate o administrador ';
}
