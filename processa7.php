<!DOCTYPE html>

<html>

<body>
  <style>
    body {
      background-color: black;
    }
  </style>
  <?php
  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
  session_start();
  include_once('conexao.php');

  $nome = strip_tags($_GET['nome']);
  $email = strip_tags($_GET['email']);
  // $emailVendedor = strip_tags($_GET['vendedor']);
  $cpf = strip_tags($_GET['cpf']);;
  $corretor = strip_tags($_GET['corretor']);
  $status = strip_tags($_GET['status']);
  $motivo = strip_tags($_GET['motivo']);
  $link = strip_tags('unidentisdigital.com.br/login2');

  echo '<br>';
  switch ($status) {
    case 'Cancelado':
      $status_correto = strip_tags("cancelada");
      break;

    case 'Indeferido':
      $status_correto = strip_tags("indeferida");
      break;
  }

  // $cpf = '11159630402';
  // $corretor = 'franklin henrique';
  // $status = 'cancelado';
  // $motivo = strip_tags('Desistência');
  // $email = 'franklinhpf@hotmail.com';
  // $senha = '123456';

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
    $mail->Host       = 'smtp.hostinger.com';                // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                            // Enable SMTP authentication
    $mail->Username   = 'unidentis.mail@unidentis.com.br';           // SMTP username
    $mail->Password   = 'xumUnid!!2021';                      // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                             // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('unidentis.mail@unidentis.com.br', 'Plano Unidentis');

    switch ($dominio = explode(".", (string)explode("@", $email)[1])[0]) {
      case "hotmail":
        if ($status_correto == "cancelada") :
          $mail->addAddress($_SESSION['usuario']);     // Add a recipient
          $mail->addAddress("cadastro2@unidentis.com.br");     // Add a recipient
        elseif ($status_correto == "indeferida") :
          $mail->addAddress($_SESSION['usuario']);     // Add a recipient
          $mail->addAddress("cadastro2@unidentis.com.br", 'Unidentis');     // Add a recipient
        endif;
        break;
      case "outlook":
        if ($status_correto == "cancelada") :
          $mail->addAddress($_SESSION['usuario']);     // Add a recipient
          $mail->addAddress("cadastro2@unidentis.com.br");     // Add a recipient
        elseif ($status_correto == "indeferida") :
          $mail->addAddress($_SESSION['usuario']);     // Add a recipient
          $mail->addAddress("cadastro2@unidentis.com.br");     // Add a recipient
        endif;
        break;
      default:
        if ($status_correto == "cancelada") :
          $mail->addAddress($email);     // Add a recipient
          $mail->addAddress($_SESSION['usuario']);     // Add a recipient
          $mail->addAddress("cadastro2@unidentis.com.br");     // Add a recipient
        elseif ($status_correto == "indeferida") :
          $mail->addAddress($_SESSION['usuario']);     // Add a recipient
          $mail->addAddress("cadastro2@unidentis.com.br");     // Add a recipient
        endif;
        break;
    }


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
    background: url(' . 'https://www.unidentis.com.br/assets/img/fundoEmail.png' . ');
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
          <h2 style="font-weight: bold;text-align: center; font-size: 1.1rem; text-transform: uppercase; color: #023bbf;font-family: ' . 'Arial' . ', Arial, Helvetica, sans-serif; margin: .5rem 30px 0 30px;padding: .25rem 1rem;">Proposta ' . strip_tags($status_correto) . '</h2>
        </td>
      </tr>
      <td style="padding: .5rem 30px">
        <table
          style="background-color: #f5f5f5; border-radius: 1rem; box-shadow: 0 0 .15rem black; font-family: Arial, Helvetica, sans-serif; margin: 0 auto; padding: .5rem 0;"
          border="0"
          cellpadding="0"
          cellspacing="0"
          width="90%"
        >
          <tr></tr>

          <tr style="height: 2rem; width: 100%; padding: 0 16px;">
            <td style="line-height: 1rem; font-size: .84rem; text-align: center;color: #606060; margin-left: 8px;">
              <span style="font-size: .79rem; text-transform: uppercase; font-weight: bold; color: #023bbf;font-family: Arial, Helvetica, sans-serif;">nome:</span> ' . $nome . '
            </td>
          </tr>
          <tr style="height: 2rem; width: 100%; padding: 0 16px;">
            <td style="line-height: 1rem; font-size: .84rem; text-align: center;color: #606060; margin-left: 8px;">
              <span style="font-size: .79rem; text-transform: uppercase; font-weight: bold; color: #023bbf;font-family: Arial, Helvetica, sans-serif;">cpf:</span> ' . $cpf . '
            </td>
          </tr>
          <tr style="height: 2rem; width: 100%; padding: 0 16px;">
            <td style="line-height: 1rem; font-size: .84rem; text-align: center;color: #606060; margin-left: 8px;">
              <span style="font-size: .79rem; text-transform: uppercase; font-weight: bold; color: #023bbf;font-family: Arial, Helvetica, sans-serif;">vendedor:</span> ' . $corretor . '
            </td>
          </tr>
          <tr style="height: 2rem; width: 100%; padding: 0 16px;">
            <td style="line-height: 1rem; font-size: .84rem; text-align: center;color: #606060; margin-left: 8px;">
              <span style="font-size: .79rem; text-transform: uppercase; font-weight: bold; color: #023bbf;font-family: Arial, Helvetica, sans-serif;">Motivo do cancelamento: </span> ' . $motivo . '
            </td>
          </tr>

          <tr></tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
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
    $mail->send();

    //Resultado aleatório com 8 caraceters
    echo "<script>window.location.assign('pendente.php')</script>";
    exit;
  } catch (Exception $e) {
    echo "<p style='color: #ffffff;'>";
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo 'Erro no Envio do E-mail contate o administrador ';
    echo "</p>";
  }
  ?>
</body>

</html>