<!-- <!DOCTYPE html>
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
</html> -->

<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// These must be at the top of your script, not inside a function
session_start();
include_once('conexao.php');
function generatePassword($qtyCaraceters = 8)
{
    //Letras minúsculas embaralhadas
    $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
 
    // //Letras maiúsculas embaralhadas
    // $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
 
    //Números aleatórios
    $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
    $numbers .= 1234567890;
 
    // //Caracteres Especiais
    // $specialCharacters = str_shuffle('!@#$%*-');
 
    //Junta tudo
    $characters = $numbers.$numbers.$numbers.$numbers;
 
    //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
    $password = substr(str_shuffle($characters), 0, $qtyCaraceters);
 
    //Retorna a senha
    return $password;
}

$nome     = $_SESSION['nome'];
$telefone = $_SESSION['telefone'];
$email    = $_SESSION['email'];
$senha    = 'u'.strip_tags(generatePassword(5));
$_SESSION['initpass'] = $senha;
$plano = $_SESSION['plano'];
$cpf = $_SESSION['cpf'];
$link = 'https://unidentisdigital.com.br/login2';

// print_r($_SESSION);


$emailTemplate = '
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
      <h2 style="text-align: center; font-size: .72rem; line-height: 1rem; text-transform: uppercase; color: #606060;font-family: '.'Arial Black'.', '.'Arial Bold'.', Arial, Helvetica, sans-serif; margin: 0 30px .25rem 30px;padding: .25rem 1.8rem;">acesse nosso sistema com os dados a seguir para concluir o cadastro da proposta</h2>
    </td>
  </tr>
  
  <!-- <tr>
    <td>
      <h3 style="letter-spacing: -.025rem; text-align: center; padding: 0 10px; font-size: 1rem; font-family: Arial, Helvetica, sans-serif; color: #2b2b2b;">DADOS DE ACESSO</h3>
    </td>
  </tr> -->
  <td style="padding: .5rem 30px">
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
          <span style="font-size: .79rem; text-transform: uppercase; font-weight: bold; color: #023bbf;font-family: Arial, Helvetica, sans-serif;"> email:</span> '.strip_tags($email).'
        </td>
      </tr>
      <tr style="height: 2rem; width: 100%; padding: 0 16px;">
        <td style="line-height: 1rem; font-size: .84rem; text-align: center;color: #606060; margin-left: 8px;">
          <span style="font-size: .79rem; text-transform: uppercase; font-weight: bold; color: #023bbf;font-family: Arial, Helvetica, sans-serif;"> senha:</span> '.$senha.'
        </td>
      </tr>
      <tr style="height: 2rem; align-items: center; width: 100%;">
        <td>
          <a href="'.$link.'" style="text-decoration: none; color: none;font-family: Arial, Helvetica, sans-serif;text-transform: uppercase; font-weight: 500; padding: 5px 10px; border-radius: .5rem; border: none; background-color: #023bbf; color: #ffffff; line-height: 1rem; font-size: .65rem; cursor: pointer; box-shadow: 0 0 .15rem black; text-align: center;">Concluir Proposta</a>
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
';

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;               // Enable verbose debug output
    $mail->isSMTP();                                           // Send using SMTP
    $mail->CharSet    = 'UTF-8';                              // setting character encoding
    $mail->Host       = 'smtp.hostinger.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                 // Enable SMTP authentication
    $mail->Username   = 'sendmail@unidentis.com.br';           // SMTP username
    $mail->Password   = 'w&Vbs60j%mYE';                      // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                             // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sendmail@unidentis.com.br', 'Plano Unidentis');
    // $mail->addAddress('franklinhpf@hotmail.com', 'Joe User');     // Add a recipient
    $mail->addAddress(strip_tags($email), 'Unidentis');     // Add a recipient

             // Name is optional
  
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Plano Unidentis';
    $mail->Body    = $emailTemplate;
    $mail->AltBody = strip_tags("email: $email | senha: ".$senha);
   
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

<!-- '
    <body  style="background-color:white">
    <img style="width:100%"src="https://www.unidentis.com.br/assets/img/bannerExemploEmail.png">                      
    <h2 style="text-align:center;align-text:center;color:#404bb5">ACESSE NOSSO SISTEMA COM OS DADOS A SEGUIR PARA CONCLUIR O CADASTRO DA PROPOSTA</h2>
    <br>
    <h3 style="text-align:center;align-text:center;" >DADOS DE ACESSO<h3>
    <div style="background-color:#f5f5f5;width:85%;margin-left:8%;height:175px;border-radius:5px">
    <h4 style="padding-top:7%;padding-left:22%">EMAIL: '.$email.' | SENHA:'.$_SESSION['senhaemail'].'<h4>
    <a href="'.$link.'"><button style="margin-left:18%;width:65%;border-color:blue;border-radius:7px;height:8%;font-size:18px;text-color:#f5f5f5">CONCLUIR CADASTRO</button></a> 
    </div>
    
    
    </body>' -->