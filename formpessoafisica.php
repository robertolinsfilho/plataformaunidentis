<?php
include("conexao.php");
session_start();
error_reporting(0);
if ($_SESSION['cpf'] === '') {
  $_SESSION['cpf'] = $_GET['cpf'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Unidentis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- step-fake -->
  <link rel="stylesheet" href="./assets/css/step-fake.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script type="text/javascript">
    $("#telefone, #celular").mask("(00) 00000-0000");
  </script>
  <script type="text/javascript">
    $("#cpf").mask("000.000.000-00");
  </script>
  <script type="text/javascript">
    $("#rg").mask("0.000.000");
  </script>
  <script type="text/javascript">
    $("#data").mask("00/00/0000");
  </script>
  <style>
    #header {
      top: 0;
      padding: 15px;
    }

    .flexLabel {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 0.5rem 0;
      margin-top: 0rem;
      margin-left: -.5rem;
    }

    .flexLabel .labelInput {
      font-size: 0.9rem;
      white-space: nowrap;
      padding-right: 1rem;
      font-weight: bold;
      color: #606060;
      text-transform: uppercase;
      font-size: 1.5rem;
      line-height: 1.875rem;
    }

    .flexLabel hr {
      position: relative;
      top: -0.15rem;
      display: block;
      width: 100%;
      height: 1px;
      background-color: #606060;
    }

    label {
      position: relative;
      z-index: 999;
      left: .5rem;
      line-height: .5rem;
      background-color: #f6f6f6;
    }

    input.form-control,
    select.form-control {
      background-color: #f6f6f6 !important;
      position: relative;
      z-index: 10;
      top: -.75rem;
    }

    .alert-primary {
      color: #f6f6f6;
      background-color: #023bbf;
      border-color: #023bbf;
    }

    /* div.fake-step hr {
      height: .25px;
      box-shadow: 0 .1px 1px rgba(0, 0, 0, 50%);
      width: 10%;
    }

    @media (max-width: 758px) {
      div.fake-step::after {
        top: 11.5rem;
      }

    } */
  </style>

</head>

<body style="background-color: #eee;">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="https://unidentis.com.br/" target="_blank"><img style="width: 38%; height: 25%;" src="http://unidentisdigital.com.br/assets/img/LOGO.png" /></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="https://unidentis.com.br/" target="_blank">Home</a></li>
          <li><a href="https://unidentis.com.br/redecredenciada" target="_blank">Rede Credenciada</a></li>
          <li><a href="https://unidentis.com.br/querosercliente" target="_blank">Tornar-se Cliente</a></li>
          <li><a href="https://unidentis.com.br/carteirinha" target="_blank">Carteira Digital</a></li>
          <li><a href="https://unidentis.com.br/segundavia" target="_blank">Boleto</a></li>



        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <section id="form3" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="200">
      <div class="d-flex justify-content-between fake-step">
        <span class="fake-step-one here"><i class="far fa-circle"></i> Responsável</span>
        <hr>
        <span class="fake-step-two"><i class="far fa-circle"></i> Dados Pessoais</span>
        <hr>
        <span class="fake-step-three"><i class="far fa-circle"></i> Arquivos</span>
      </div>
      <?php
      $boleto40 = $_SESSION['boleto'];


      if ($boleto40 === 'UNIDENTIS VIP BOLETO') {
        $dono = " ";
      } elseif ($boleto40 === 'UNIDENTISVIPCARTAO') {
        $dono = "(Dono do Cartão)";
      } elseif ($boleto40 === 'UNIDENTISVIPFAMILIACARTAO') {
        $dono = "(Dono do Cartão)";
      } elseif ($boleto40 === 'UNIDENTISVIPUNIVERSITARIOCARTAO') {
        $dono = "(Dono do Cartão)";
      } elseif ($boleto40 === 'PLANOVIPORTOCARTAO') {
        $dono = "(Dono do Cartão)";
      } elseif ($boleto40 === 'UNIDENTISVIPEMPRESARIAL') {
        $dono = " ";
      }
      ?>

      <div class="flexLabel">
        <label class="labelInput">Dados Responsável Financeiro <?php echo $dono ?></label>
        <hr>
      </div>
      <form action="enviopessoafisica" method="POST">
        <div class="row">
          
        <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Nome Completo</label>
            <input type="text" name="nome" class="form-control" placeholder="*"  required>
          </div>
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">CPF:</label>
            <input type="text" id="cpf" minlenght="14" name="cpf" placeholder="*" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="*"   required>
          </div>

          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Plano:</label>
            <input type="text" class="form-control" value="<?php echo $_SESSION['boleto'] ?>" name="plano" readonly>
          </div>
          <div class="col-md-2">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Celular:</label>
            <input type="text" name="celular" id="celular" class="form-control" placeholder="*"  required>
          </div>
          <div class="col-md-2">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Estado:</label>
            <select class="form-control" name="estado">
              <option>AC</option>
              <option>AL</option>
              <option>AP</option>
              <option>AM</option>
              <option>BA</option>
              <option>CE</option>
              <option>DF</option>
              <option>ES</option>
              <option>GO</option>
              <option>MA</option>
              <option>MT</option>
              <option>MS</option>
              <option>MG</option>
              <option>PA</option>
              <option selected >PB</option>
              <option>PR</option>
              <option>PE</option>
              <option>PI</option>
              <option>RJ</option>
              <option>RN</option>
              <option>RS</option>
              <option>RO</option>
              <option>RR</option>
              <option>SC</option>
              <option>SP</option>
              <option>SE</option>
              <option>TO</option>
            </select>

          </div>

          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Numero do Cartao SUS</label>
            <input type="text" name="sus" class="form-control" ">
          </div>

          <?php
          if ($_SESSION['boleto'] == 'UNIDENTISVIPEMPRESARIAL') {
          ?>

            <div class=" col-md-2">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Matricula</label>
            <input type="text" name="matricula" class="form-control" placeholder="*"  required>
          </div>
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Data de Admissão</label>
            <input type="date" name="admissao" class="form-control" placeholder="*"  required>
          </div>
        <?php
          }
        ?>
        </div>
        <div class="d-flex flex-column">
          <h6>O Contratante <?php echo $dono ?> será o beneficiário do plano ? </h6>
          <div class="d-flex">
            <div class="form-check form-check-inline mr-3">
              <input type="radio"  value="sim" name="beneficiario" id="inlineCheckbox1" required>
              <label class="form-check-label" for="inlineCheckbox1">Sim</label>
            </div>
            <div class="form-check form-check-inline mr-3">
              <input type="radio" value="não" name="beneficiario" id="inlineCheckbox2" required>
              <label class="form-check-label" for="inlineCheckbox2">Não</label>
            </div>
              <!--  Female<br> -->
          </div>
          <!-- <div class="d-flex">
            <div class="form-check form-check-inline mr-3">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
              <label class="form-check-label" for="inlineCheckbox1">Sim</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
              <label class="form-check-label" for="inlineCheckbox2">Não</label>
            </div>
          </div> -->
          <button type="submit" class="btn-get-started scrollto">Prosseguir</button>
        </div>
      </form>
    </div>
  </section>


</body>
<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</html>