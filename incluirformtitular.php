<?php
include("conexao.php");
session_start();
$cpf = $_SESSION['cpf'];



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

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
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

    input.form-control {
      background-color: #f6f6f6 !important;
      position: relative;
      top: -1.1rem;
    }

    .alert-primary {
      color: #f6f6f6;
      background-color: #023bbf;
      border-color: #023bbf;
    }
  </style>
  <link rel="stylesheet" href="./assets/css/step-fake.css">
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
  <div id="centro" class="row" style="margin-bottom: 0rem;"> </div>
  <section id="form3" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="200">
      <div class="d-flex justify-content-between fake-step">
        <span class="fake-step-one here"><i class="far fa-circle"></i> Dados Pessoais</span>
        <hr>
        <span class="fake-step-two"><i class="far fa-circle"></i> Endereço</span>
        <hr>
        <span class="fake-step-three"><i class="far fa-circle"></i> Beneficiários</span>
      </div>
      <!-- <div style="font-size:26px;" class="alert alert-primary" role="alert">
        Incluir Dependente - <?php //echo $_SESSION['nomeplano'] ?>
      </div> -->
      <div class="flexLabel">
        <label class="labelInput">Dados do Titular</label>
        <hr>
      </div>
      <form action="incluirformendereco#centro" method="POST">
        <div class="row">
          <div class="col">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Nome Completo</label>
            <input type="text" name="nome" class="form-control" value="<?php echo $_SESSION['nomeCpf'] ?>" placeholder="Nome Completo" readonly>
          </div>

        </div>
        <div class="row">
          <div class="col">
            <label style="font-family:'Poppins', sans-serif;" for="LabelNome">E-mail</label>
            <input type="text" name="email" class="form-control" value="<?php echo isset($_SESSION['emaildependente']) ? $_SESSION['emaildependente'] : ''; ?>" required>

          </div>
          <div class="col">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Telefone</label>
            <input type="text" name="celular" class="form-control" value="<?php echo $_SESSION['celulardependente']; ?>" placeholder="Nome Completo" readonly>
          </div>

          <br>
        </div>
        <br>
        <button type="submit" class="btn-get-started scrollto">prosseguir</button>        
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