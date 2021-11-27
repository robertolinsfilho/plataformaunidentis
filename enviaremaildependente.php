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

$emailTemplate = '
<table
align="center"
border="0"
cellpadding="0"
cellspacing="0"
width="400"
style="border: 0px solid black; text-align: center; margin: 0 auto; border-radius: 1rem; overflow: hidden; box-shadow: 0 0px 8px #000000;"
>
<td
  align="center"
  style="
    background: url('.'https://www.unidentis.com.br/assets/img/fundoEmail.png'.');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    width: 400px;
    height: 8rem;
  "
  ;
>
  <img src="https://www.unidentis.com.br/assets/img/logoAnsEmail.png" alt="Logo Unidentis com Ans" width="240" style="display:block;filter:drop-shadow(0 0 4px #2b2b2b);margin-top: 8px;">
</td>
<tr>
  <tr>
    <td>
      <h2 style="text-align: center; font-size: .72rem; line-height: 1rem; text-transform: uppercase; color: #606060;font-family: '.'Arial Black'.', '.'Arial Bold'.', Arial, Helvetica, sans-serif; margin: 0 30px .25rem 30px;padding: .25rem 1.8rem;">Para Confirmação de Adição de Dependentes Segue  o Código</h2>
    </td>
  </tr>
  
  <!-- <tr>
    <td>
      <h3 style="letter-spacing: -.025rem; text-align: center; padding: 0 10px; font-size: 1rem; font-family: Arial, Helvetica, sans-serif; color: #2b2b2b;">DADOS DE ACESSO</h3>
    </td>
  </tr> -->
  <td style="padding: .5rem 30px">
    <table
      style="background-color: #f5f5f5; border-radius: 1rem; box-shadow: 0 0 .15rem black; font-family: Arial, Helvetica, sans-serif; margin: 0 auto; padding: 8px 16px 8px 16px; height: 4.5rem;"
      border="0"
      cellpadding="0"
      cellspacing="0"
      width="90%"
    >
      <tr></tr>
      <tr style="height: 1rem; width: 100%; padding: 0 16px;">
        <td style="line-height: 1rem; font-size: .84rem; text-align: center;color: #606060; margin-left: 8px;">
          <span style="font-size: .79rem; text-transform: uppercase; font-weight: bold; color: #023bbf;font-family: Arial, Helvetica, sans-serif;">Código: </span>'.strip_tags($_SESSION['senhadependente']).'
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
</table>';

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->CharSet    = 'UTF-8';
    $mail->Host       = 'smtp.gmail.com';               // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                               // Enable SMTP authentication
    $mail->Username   = 'unidentis.mail@unidentis.com.br';  // SMTP username
    $mail->Password   = 'hiuqxpsyltfpxaep';                    // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('unidentis.mail@unidentis.com.br', 'Plano Unidentis');
    // $mail->addAddress('vendas2@unidentis.com.br' , 'Unidentis');     
    $mail->addAddress(strip_tags($_SESSION['emaildependente']) , 'Unidentis');     

 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Plano Unidentis';
    $mail->Body    = $emailTemplate;
   

    $mail->send();
   
    echo "<script>window.location.assign('confirmarcodigo.php')</script>";
    exit;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo 'Erro no Envio do E-mail contate o administrador ';
}
