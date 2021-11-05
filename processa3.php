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


$cpf = $_GET['key'];
 
$queryDadosGeraisAssociado = mysqli_query($conexao, "SELECT * from dadospessoais where forekey ='$cpf'");
$dadosGeraisAssocidado = mysqli_fetch_assoc($queryDadosGeraisAssociado);

$queryDadosPrincipaisAssociado = mysqli_query($conexao, "SELECT * from dadosprincipais where forekey ='$cpf'");
$dadosPrincipaisAssocidado = mysqli_fetch_assoc($queryDadosPrincipaisAssociado);

// $cpf = '11159630402';

if($dadosGeraisAssocidado['etapa'] == 1){
    $link = 'https://unidentisdigital.com.br/formpessoafisica?key='.$cpf;
}elseif($dadosGeraisAssocidado['etapa'] == 2){
    $link = 'https://unidentisdigital.com.br/formdadospessoais?key='.$cpf;
}elseif($dadosGeraisAssocidado['etapa'] == 3 ){
    $link = 'https://unidentisdigital.com.br/formenviofotos?key='.$cpf;
}elseif($dadosGeraisAssocidado['etapa'] == 4){
    $link = 'https://unidentisdigital.com.br/formendereco?key='.$cpf;
}elseif($dadosGeraisAssocidado['etapa'] == 5 && $dadosGeraisAssocidado['plano'] == 'UNIDENTISVIPBOLETO'){
    $link = 'https://unidentisdigital.com.br/titular?key='.$cpf;
}elseif($dadosGeraisAssocidado['etapa'] == 5){
    $link = 'https://unidentisdigital.com.br/titularcartao?key='.$cpf;
}elseif($dadosGeraisAssocidado['etapa'] == 6){
    $link = 'https://unidentisdigital.com.br/login2';
}

$email = strip_tags($dadosPrincipaisAssocidado['email']);
$senha = strip_tags($dadosPrincipaisAssocidado['initpass']);

echo $senha;

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
    $mail->CharSet    = 'UTF-8';                         // setting character encoding
    $mail->Host       = 'smtp.gmail.com';                // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                            // Enable SMTP authentication
    $mail->Username   = 'unidentis.mail@unidentis.com.br';           // SMTP username
    $mail->Password   = 'hiuqxpsyltfpxaep';                      // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                             // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


    //Recipients
    $mail->setFrom('unidentis.mail@unidentis.com.br', 'Plano Unidentis');
    $mail->addAddress( $email  , 'Unidentis');     // Add a recipient
             // Name is optional
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Plano Unidentis';
    $mail->Body    = '
    <table
    align="center"
    border="0"
    cellpadding="0"
    cellspacing="0"
    width="500"
    style="border: 0px solid black; text-align: center; margin: 0 auto; border-radius: 1rem; overflow: hidden; box-shadow: 0 0px 8px #000000;"
  >
  <td
  align="center"
  style="
    background: url('.'https://www.unidentis.com.br/assets/img/fundoEmail.png'.');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    width: 500px;
    height: 8rem;
  "
  ;
>
  <img src="https://www.unidentis.com.br/assets/img/logoAnsEmail.png" alt="Logo Unidentis com Ans" width="240" style="display:block;filter:drop-shadow(0 0 4px #2b2b2b);margin-top: 8px;">
</td>
    <tr>
      <tr>
        <td>
          <h2 style="font-weight: bold;text-align: center; font-size: 1.1rem; text-transform: uppercase; color: #023bbf;font-family: '.'Arial'.', Arial, Helvetica, sans-serif; margin: .5rem 30px 0 30px;padding: .25rem 1rem;">Proposta Cadastrada</h2>
        </td>
      </tr>
      <tr>
        <td>
          <h2 style="text-align: center; font-size: .72rem; line-height: 1rem; text-transform: uppercase; color: #606060;font-family: '.'Arial Black'.', '.'Arial Bold'.', Arial, Helvetica, sans-serif; margin: 0 30px .25rem 30px;padding: .25rem 1.8rem;">ACESSE NOSSO SISTEMA CLICANDO NO BOTÃO A SEGUIR PARA CONCLUIR O CADASTRO DA PROPOSTA</h2>
        </td>
      </tr>
      <td style="padding: .5rem 30px;">
        <table
          style="background-color: #f5f5f5; border-radius: 1rem; box-shadow: 0 0 .15rem black; font-family: Arial, Helvetica, sans-serif; margin: 0 auto; padding: 8px 16px 8px 16px; height: 7.5rem;"
          border="0"
          cellpadding="0"
          cellspacing="0"
          width="90%"
        >
          <tr></tr>
          <tr style="height: 2rem; width: 100%; padding: 0 16px;">
            <td style="line-height: 1rem; font-size: .84rem; text-align: center;color: #606060; margin-left: 8px;">
            <span style="font-size: .79rem; text-transform: uppercase; font-weight: bold; color: #023bbf;font-family: Arial, Helvetica, sans-serif;">email:</span> '.$email.'
            </td>
          </tr>
          <tr style="height: 2rem; width: 100%; padding: 0 16px;">
            <td style="line-height: 1rem; font-size: .84rem; text-align: center;color: #606060; margin-left: 8px;">
              <span style="font-size: .79rem; text-transform: uppercase; font-weight: bold; color: #023bbf;font-family: Arial, Helvetica, sans-serif;">senha:</span> '.$senha.'
            </td>
          </tr>
          <tr style="height: 2rem; align-items: center; width: 100%;">
            <td>
              <a href="'.strip_tags($link).'" style="text-decoration: none; color: none;font-family: Arial, Helvetica, sans-serif;text-transform: uppercase; font-weight: 500; padding: 5px 10px; border-radius: .5rem; border: none; background-color: #023bbf; color: #ffffff; line-height: 1rem; font-size: .65rem; cursor: pointer; box-shadow: 0 0 .15rem black; text-align: center;">Clique Aqui</a>
            </td>
          </tr>
          <tr></tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <h3 style="text-align: center; font-size: .72rem; line-height: 1rem; text-transform: uppercase; color: #606060;font-family: '.'Arial Black'.', '.'Arial Bold'.', Arial, Helvetica, sans-serif; margin: 0 30px .25rem 30px;padding: .25rem 2rem;">Agradecemos a sua escolha!</h3>
      </td>
    </tr>
    <tr>
      <td bgcolor="#023bbf">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <td
              width="75%"
              style="
                color: #f6f6f6;
                font-family: Arial, sans-serif;
                font-size: .7rem;
                padding: 5px 2%;
                text-align: left;
              "
            >
              &copy; Unidentis Assistência Odontológica
            </td>
            <td align="right" style="padding: 5px 2%">
              <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <a href="https://www.unidentis.com.br/" target="_blank">
                      <img
                        src="https://www.unidentis.com.br/assets/img/Vectorsite.png"
                        alt="Twitter"
                        height="20"
                        style="display: block"
                        border="0"
                      />
                    </a>
                  </td>
                  <td style="font-size: 0; line-height: 0" width="20">
                    &nbsp;
                  </td>
                  <td>
                    <a href="https://www.instagram.com/unidentisoficial/" target="_blank">
                      <img
                        src="https://www.unidentis.com.br/assets/img/Vectorinsta.png"
                        alt="Facebook"
                        height="20"
                        style="display: block"
                        border="0"
                      />
                    </a>
                  </td>
                  <td style="font-size: 0; line-height: 0" width="20">
                    &nbsp;
                  </td>
                  <td>
                    <a href="https://www.facebook.com/unidentisoficial/" target="_blank">
                      <img
                        src="https://www.unidentis.com.br/assets/img/Vectorface.png"
                        alt="Facebook"
                        height="20"
                        style="display: block"
                        border="0"
                      />
                    </a>
                  </td>
                  <td style="font-size: 0; line-height: 0" width="20">
                    &nbsp;
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  ' ;
    
    //'<body style="background-color:white">
    
    // <img style="width:100%"src="http://unidentisdigital.com.br/assets/img/PROPOSTACADASTRADA2.png"> 
    // <div style="background-color:#f5f5f5;width:85%;margin-left:8%;height:175px;border-radius:5px">
    // <h2 style="text-align:center;align-text:center;color:#404bb5" >FINALIZAR PROPOSTA</h2>
    // <h3 style="text-align:center;align-text:center;color:#404bb5">ACESSE NOSSO SISTEMA  CLICANDO NO BOTAO A SEGUIR  PARA CONCLUIR O CADASTRO DA PROPOSTA</h3>
   
   
    
    // </div>
    // <a href="'.$link.'"><button style="margin-left:18%;width:65%;border-color:blue;border-radius:7px;height:8%;font-size:18px;text-color:#f5f5f5">Clique aqui </button></a> <br><br></body>';
   

    $mail->send();
    	
    echo "<script>window.location.assign('index.php')</script>";
    exit;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo 'Erro no Envio do E-mail contate o administrador ';
}
