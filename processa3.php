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


$cpf = $_SESSION['cpfnova'];
$result_usuario = "SELECT * from dadospessoais where cpf ='$cpf'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

if($row_usuario['etapa'] == 1){
    $link = 'unidentisdigital.com.br/formpessoafisica?cpf='.$cpf;
}elseif($row_usuario['etapa'] == 2){
    $link = 'unidentisdigital.com.br/formdadospessoais?cpf='.$cpf;
}elseif($row_usuario['etapa'] == 3 ){
    $link = 'unidentisdigital.com.br/formenviofotos?cpf='.$cpf;
}elseif($row_usuario['etapa'] == 4){
    $link = 'unidentisdigital.com.br/formendereco?cpf='.$cpf;
}elseif($row_usuario['etapa'] == 5 && $row_usuario['plano'] == 'UNIDENTISVIPBOLETO'){
    $link = 'unidentisdigital.com.br/titular?cpf='.$cpf;
}elseif($row_usuario['etapa'] == 5){
    $link = 'unidentisdigital.com.br/titularcartao?cpf='.$cpf;
}elseif($row_usuario['etapa'] == 6){
    $link = 'unidentisdigital.com.br/login2';
}



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
    $mail->addAddress( $row_usuario['email']  , 'Unidentis');     // Add a recipient
             // Name is optional
  

 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Plano Unidentis';
    $mail->Body    = '<body style="background-color:white">
    
    <img style="width:100%"src="http://unidentisdigital.com.br/assets/img/PROPOSTACADASTRADA2.png"> 
    <div style="background-color:#f5f5f5;width:85%;margin-left:8%;height:175px;border-radius:5px">
    <h2 style="text-align:center;align-text:center;color:#404bb5" >FINALIZAR PROPOSTA</h2>
    <h3 style="text-align:center;align-text:center;color:#404bb5">ACESSE NOSSO SISTEMA  CLICANDO NO BOTAO A SEGUIR  PARA CONCLUIR O CADASTRO DA PROPOSTA</h3>
   
   
    
    </div>
    <a href="'.$link.'"><button style="margin-left:18%;width:65%;border-color:blue;border-radius:7px;height:8%;font-size:18px;text-color:#f5f5f5">Clique aqui </button></a> <br><br></body>';
   

    $mail->send();
    	
//Resultado aleatório com 8 caraceters
echo "<script>window.location.assign('index.php')</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo 'Erro no Envio do E-mail contate o administrador ';
}
