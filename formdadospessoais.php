<?php
include("conexao.php");
session_start();
if (isset($_GET['key'])) {
  $forekey = $_GET['key'];
  $queryDadosGeraisAssociado = mysqli_query($conexao, "SELECT * from dadospessoais where forekey = '$forekey'");
  $dadosGeraisAssociado = mysqli_fetch_assoc($queryDadosGeraisAssociado);

  $_SESSION['nome']     = $dadosGeraisAssociado['nome'];
  $_SESSION['cpf']      = $dadosGeraisAssociado['cpf'];
  $_SESSION['email']    = $dadosGeraisAssociado['email'];
  $_SESSION['celular']  = $dadosGeraisAssociado['celular'];
  $_SESSION['estado']   = $dadosGeraisAssociado['estado'];
  $_SESSION['plano']    = $dadosGeraisAssociado['plano'];
  $_SESSION['sus']      = $dadosGeraisAssociado['sus'];
  $_SESSION['vendedor1'] = $dadosGeraisAssociado['vendedor'];
  $_SESSION['forekey']  = $forekey; 
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

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

  <!-- step-fake -->
  <link rel="stylesheet" href="./assets/css/step-fake.css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
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
      background-color: #f6f6f6;
    }

    input.form-control,
    select.form-control {
      background-color: #f6f6f6 !important;
      position: relative;
      top: -1.1rem;
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
    <div id="centro" class="container" data-aos="zoom-out" data-aos-delay="200">
      <div class="d-flex justify-content-between fake-step">
        <span class="fake-step-one done"><i class="fas fa-check-circle"></i> Responsável</span>
        <hr>
        <span class="fake-step-two here"><i class="far fa-circle"></i> Dados Pessoais</span>
        <hr>
        <span class="fake-step-three"><i class="far fa-circle"></i> Arquivos</span>
      </div>
      <div class="flexLabel">
        <label class="labelInput">Dados Pessoais</label>
        <hr>
      </div>
      <form action="enviodadospessoais" method="POST">
        <div class="row">
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Sexo:</label>
            <select name="sexo" placeholder="selecione" class="form-control">
              <option value="1">Masculino</option>
              <option value="0">Feminino</option>
              <option value="" selected disabled>Selecione</option>
            </select>
          </div>

          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Whats's App:</label>
            <input type="text" name="whats" minlenght="15" id="celular" class="form-control" placeholder="*"  required>
          </div>
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">RG:</label>
            <input type="text" name="rg" class="form-control"placeholder="*"  required>
          </div>

          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Estado Civil:</label>
            <select class="form-control" placeholder="selecione" name="estadocivil">
              <option value="Casado(a)">Casado(a)</option>
              <option value="Solteiro(a)">Solteiro(a)</option>
              <option value="Viuvo(a)">Viuvo(a)</option>
              <option value="Divorciado(a)">Divorciado(a)</option>
              <option value="" selected disabled>Selecione</option>
            </select>
          </div>
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Data Nascimento</label>
            <input type="text" name="datas" id="data" class="form-control" placeholder="DD/MM/ANO *" required>
          </div>
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Orgao Expedidor</label>
            <input type="text" name="expedidor" class="form-control"placeholder="*"  required>
          </div>

          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Nome da Mae</label>
            <input type="text" name="mae" class="form-control"placeholder="*" required>
          </div>
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Telefone fixo</label>
            <input type="text" name="fixo" class="form-control" placeholder="Telefone Fixo">
          </div>
        </div>
        <input type="hidden" name="forekey" value="<?= $_SESSION['forekey']; ?>">
        <button type="submit" class="btn-get-started scrollto">prosseguir</button>
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