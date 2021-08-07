<!DOCTYPE html>
<body style="background-color: black;">
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
session_start();
include_once('conexao.php');
function generatePassword($qtyCaraceters = 8)
{
    //Letras minúsculas embaralhadas
    $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
 
    //Letras maiúsculas embaralhadas
    $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
 
    //Números aleatórios
    $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
    $numbers .= 1234567890;
 
    //Caracteres Especiais
    $specialCharacters = str_shuffle('!@#$%*-');
 
    //Junta tudo
    $characters = $capitalLetters.$smallLetters.$numbers.$specialCharacters;
 
    //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
    $password = substr(str_shuffle($characters), 0, $qtyCaraceters);
 
    //Retorna a senha
    return $password;
}
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
  
$_SESSION['senhaemail'] = generatePassword(5);
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Plano Unidentis';
    $mail->Body    = '<body  style="background-color:white">
                        <img style="width:100%"src="http://unidentisdigital.com.br/assets/img/PROPOSTACADASTRADA2.png">                      
                        <h2 style="text-align:center;align-text:center;color:#404bb5">ACESSE NOSSO SISTEMA COM OS DADOS A SEGUIR PARA CONCLUIR O CADASTRO DA PROPOSTA</h2>
                        <br>
                        <h3 style="text-align:center;align-text:center;" >DADOS DE ACESSO<h3>
                        <div style="background-color:#f5f5f5;width:85%;margin-left:8%;height:175px;border-radius:5px">
                        <h4 style="padding-top:7%;padding-left:22%">EMAIL: '.$email.' | SENHA:'.$_SESSION['senhaemail'].'<h4>
                        <a href="'.$link.'"><button style="margin-left:18%;width:65%;border-color:blue;border-radius:7px;height:8%;font-size:18px;text-color:#f5f5f5">CONCLUIR CADASTRO</button></a> 
                        </div>
                        
                       
                        </body>';
   

    $mail->send();
    	
//Resultado aleatório com 8 caraceters
echo "<script>window.location.assign('enviofinal2.php')</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo 'Erro no Envio do E-mail contate o administrador ';
}
?>
</body>
</html>