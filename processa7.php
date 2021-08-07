<!DOCTYPE html>

<html>
<body>
<style>
body{
    background-color:black;
}
</style>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
session_start();
include_once('conexao.php');

$nome = $_GET['nome'];
$email = $_GET['email'];

$cpf = $_GET['cpf'];;
$corretor = $_GET['corretor'];
$status = $_GET['status'];
$motivo = $_GET['motivo'];
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
    $mail->Body    = '<body  style="background-color:white">
                        <img style="width:100%"src="http://unidentisdigital.com.br/assets/img/PROPOSTACADASTRADA2.png">                      
                        <h2 style="text-align:center;align-text:center;color:#404bb5">Proposta '.$status.'</h2>
                      
                        <h3 style="text-align:center;align-text:center;color:black" >DADOS DA PROPOSTA<h3>
                        <div style="background-color:#f5f5f5;width:85%;margin-left:8%;height:175px;border-radius:5px">
                        <h4 style="padding-top:2%;color:black">NOME: '.$nome.'</h4>
                        <h4 style="padding-top:0%;color:black">CPF: '.$cpf.'</h4>
                        <h4 style="padding-top:0%;color:black">VENDEDOR: '.$corretor.'</h4>
                        <h4 style="padding-top:0%;color:black">CANCELAMENTO INFORMADO: '.$motivo.'</h4>
                
                        </div>
                        
                       
                        </body>';
   

    $mail->send();
    	
//Resultado aleatório com 8 caraceters
echo "<script>window.location.assign('pendente.php')</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo 'Erro no Envio do E-mail contate o administrador ';
}
?>
</body>
</html>