<?php
include("conexao.php");
session_start();


$result_usuario = "SELECT * from dependentes where forekey ='{$_SESSION['forekey']}' and ativo = '1'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

$result_usuario2 = "SELECT * from dadospessoais where forekey ='{$_SESSION['forekey']}' ";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
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
  <link rel="shortcut icon" href="./assets/img/favicon.ico">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="./assets/css/step-fake.css">

  <script type="text/javascript">
    $("#telefone, #celular").mask("(00) 00000-0000");
  </script>
  <script type="text/javascript">
    $("[cpf]").mask("000.000.000-00");
  </script>
  <script type="text/javascript">
    $("#rg").mask("0.000.000");
  </script>
  <script type="text/javascript">
    $("#data").mask("00/00/0000", {
      reverse: true
    });
    $('#myModal').on('shown.bs.modal', function() {
      $('#myInput').trigger('focus')
    })
  </script>
  <link rel="stylesheet" href="./assets/css/cadDependentes.css">
  <link rel="stylesheet" href="./assets/css/isRequired.css">

  <!-- =======================================================
  * Template Name: BizLand - v1.1.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
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

  <section id="form3" class="align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="d-flex justify-content-between fake-step">
        <span class="fake-step-one done"><i class="fa fa-check-circle" aria-hidden="true"></i> Dados Pessoais</span>
        <hr>
        <span class="fake-step-two done"><i class="fa fa-check-circle" aria-hidden="true"></i> Endere??o</span>
        <hr>
        <span class="fake-step-three here"><i class="far fa-circle"></i> Benefici??rios</span>
      </div>
      <div class="flexLabel">
        <label class="labelInput">Cadastro de Dependente</label>
        <hr>
      </div>
      <form action="dependentes4" method="POST">
        
        <div class="row">
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Nome Completo</label>
            <input type="text" name="nome" class="form-control isRequired" minlength="10" required>
          </div>
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">CPF</label>
            <input type="text" name="cpf" id="cpf" cpf class="form-control isRequired" required>
          </div>
          <div class="col-md-2">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Parentesco</label>
            <select name="parentesco" class="form-control isRequired" required>
              <option value="3">CONJUGE</option>
              <option value="4">FILHO(A)</option>
              <option value="8">PAI/M??E</option>
              <option value="6">ENTEADO(A)</option>
              <option value="10">OUTRO(A)</option>
              <option selected disabled value="">Selecione</option>
            </select>
          </div>
          <div class="col-md-2">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Sexo</label>
            <select name="sexo" class="form-control isRequired" required>
              <option value="1">masculino</option>
              <option value="0">feminino</option>
              <option selected disabled value="">Selecione</option>
            </select>
          </div>
          
          <div class="col-md-2">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">CPF Titular</label>
            <input type="text" name="cpf_titular" cpf value="<?php echo $_SESSION['cpf'] ?>" class="form-control isRequired" Completo" readonly required>
          </div>

          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">CNS-CARTAO SUS</label>
            <input type="text" name="cns" class="form-control" minlength="15" maxlength="15" do cart??o">
          </div>

          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Estado Civil</label>
            <select class="form-control isRequired" name="estadocivil" required>
              <option>casado</option>
              <option>solteiro</option>
              <option>viuvo</option>
              <option>divorciado</option>
              <option selected disabled value="">Selecione</option>
            </select>
          </div>
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Data Nascimento</label>
            <input type="text" name="datas" id="data" class="form-control isRequired" MM/ANO" required>
          </div>
          <div class="col-md-3">
            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Nome da M??e</label>
            <input type="text" name="mae" class="form-control isRequired" minlenght="10" da Mae" required>
          </div>
        </div>
        <button type="submit" isRequired class="btn btn-primary saveBtn check">Salvar</button>
      </form>
    </div>
    <div class="container" style="margin-top: 1.5rem;" data-aos="zoom-out" data-aos-delay="100">
      <div class="flexCadDep">

        <?php
        $cont = 0;
        while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
          $parentsc;
          switch ($row_usuario['parentesco']) {
            case '4':
              $parentsc = 'Filho';
              break;
            case '3':
              $parentsc = 'Conjuge';
              break;
            case '6':
              $parentsc = 'Enteado';
              break;
            case '8':
              $parentsc = 'Pai/m??e';
              break;
            case '10':
              $parentsc = 'Outro(a)';
              break;
          };
          $str = explode(" ", $row_usuario['nome']);
          if (count($str) > 1) $nstr = $str[0] . ' ' . $str[1];
          else $nstr = $str[0];
        ?>
          <div class="cadDependente">
            <h4 id="form" style="color:black;font-size:20px;padding-top:10px;padding-left:15px;padding-right:15px;"><?php echo $nstr ?> (<?php echo $parentsc ?>)</h4>
            <br>
            <div class="d-flex justify-content-center">
              <button class="btn btn-secondary mr-3" data-toggle="modal" data-target="#myModal-<?php echo $cont; ?>">Editar</button></a>
              <a href="excluirdependente?id=<?php echo $row_usuario['id'] ?>"><button class="btn btn-danger">Excluir</button></a>
            </div>
          </div>
        <?php
          $cont++;
        }
        ?>
      </div>

      <?php


      function tirarAcentos($string)
      {
        $string = str_replace(" ", "", $string);
        return preg_replace(array("/(??|??|??|??|??)/", "/(??|??|??|??|??)/", "/(??|??|??|??)/", "/(??|??|??|??)/", "/(??|??|??|??)/", "/(??|??|??|??)/", "/(??|??|??|??|??)/", "/(??|??|??|??|??)/", "/(??|??|??|??)/", "/(??|??|??|??)/", "/(??)/", "/(??)/", "/(??|??)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
      }

      $_SESSION['nomeplano'] =  tirarAcentos($_SESSION['nomeplano']);
      $_SESSION['nomeplano'] = tirarAcentos($_SESSION['nomeplano']);

      $preco = 0;
      switch ($_SESSION['nomeplano']) {
        case 'PLANOVIPORTOCARTAO':
          $preco = 99;
          break;
        case 'UNIDENTISVIPORTO':
          $preco = 99;
          break;
        case 'UNIDENTISVIPCARTAO':
          switch ($_SESSION['valorplano']) {
            case '23.9':
              $preco = 22.9;
              break;
            case '25.9':
              $preco = 24.9;
              break;
          }
          break;
        case 'UNIDENTISVIPFAMILIACARTAO':
          switch ($_SESSION['valorplano']) {
            case '60':
              $preco = 30;
              if($cont > 1){
                $preco = 20;
              }
              break;
            case '30':
              $preco = 20;
              break;
            case '66':
              $preco = 33;
              if($cont > 1){
                $preco = 22;
              }
              break;
            case '33':
              $preco = 22;
              break;
          }
          break;
        case 'UNIDENTISVIPUNIVERSITARIOCARTAO':
          switch ($_SESSION['valorplano']) {
            case '21.90':
              $preco = 20.90;
              if($cont > 1){
                $preco = 19.90;
              }
              break;
            case '20.90':
              $preco = 19.90;
              break;
            case '25':
              $preco = 24;
              if($cont > 1){
                $preco = 23;
              }
              break;
            case '24':
              $preco = 23;
              break;
          }
          break;
        case 'UNIDENTISVIPUNIVERSITARIO':
          switch ($_SESSION['valorplano']) {
            case '21.90':
              $preco = 20.90;
              if($cont > 1){
                $preco = 19.90;
              }
              break;
            case '20.90':
              $preco = 19.90;
              break;
            case '25':
              $preco = 24;
              if($cont > 1){
                $preco = 23;
              }
              break;
            case '24':
              $preco = 23;
              break;
          }
          break;
        case 'UNIDENTISVIPEMPRESARIAL':
          $preco = 18;
          break;
        default:
          $preco = $_SESSION['valorplano'];
          break;
      }

      if($preco == 0){
        $preco = $_SESSION['valorplano'];
      }

      $preco3 = $preco * $cont;
      $preco = $preco + $preco3;
      
      $_SESSION['preco'] = $preco;

      ?>
      <div class="d-flex justify-content-center align-items-end flex-wrap">

        <div id="resumo" class="mr-auto">
          <h2 style="font-family: 'Poppins', sans-serif;font-size:1rem; color: #ffffff;text-transform: uppercase;">Resumo da Proposta </h2>
          <h3 style="font-family: 'Poppins', sans-serif;font-size:.9rem">Valor Por Dependente R$<?php echo $preco ?></h3>
          <hr style='background-color: #ffffff;'>
          <h3 style="font-family: 'Poppins', sans-serif;font-size:.9rem">Total R$<?php echo $preco3 ?></h3>

        </div>
        <!-- <button type="button" style="margin-right: 1rem;height:40px" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Cadastrar Dependentes</button> -->
        <a href="enviaremaildependente" style="height:40px" class="btn btn-primary">Confirmar Proposta</a>
      </div>
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
<?php

$result_usuario = "SELECT * from dependentes where forekey ='{$_SESSION['forekey']}' and ativo = '1'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$cont = 0;
while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
?>
  <!-- The Modal -->
  <div class="modal" id="myModal-<?php echo $cont; ?>">
    <div class="modal-dialog" style='max-width: 600px !important;'>
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar Dependente</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <form action="updatedependente" method="POST">
            <div class="row">

              <div class="col">
                <input type="hidden" name="id" value="<?= $row_usuario['id'] ?>">
                <label style="font-family:'Poppins', sans-serif;" for="LabelNome">CPF:</label>
                <input type="text" name="cpf" id="cpf" cpf class="form-control" value="<?= $row_usuario['cpf'] ?>">
              </div>
              <div class="col">
                <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Parentesco</label>
                <select name="parentesco" class="form-control" required>
                  <option <?= $row_usuario['parentesco'] == 3 ? 'selected' : '' ?> value="3">CONJUGE</option>
                  <option <?= $row_usuario['parentesco'] == 4 ? 'selected' : '' ?> value="4">FILHO(A)</option>
                  <option <?= $row_usuario['parentesco'] == 8 ? 'selected' : '' ?> value="8">PAI/M??E</option>
                  <option <?= $row_usuario['parentesco'] == 6 ? 'selected' : '' ?> value="6">ENTEADO(A)</option>
                  <option <?= $row_usuario['parentesco'] == 10 ? 'selected' : '' ?> value="10">OUTRO(A)</option>
                  <option disabled value="">Selecione</option>
                </select>
              </div>
              <div class="col">
                <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Sexo:</label>
                <select name="sexo" class="form-control">
                  <option <?= $row_usuario['sexo'] == 1 ? 'selected' : '' ?> value="1">masculino</option>
                  <option <?= $row_usuario['sexo'] == 0 ? 'selected' : '' ?> value="0">feminino</option>
                  <option disabled value="">Selecione</option>
                </select>
              </div>

            </div>
            <br>
            <div class="row">
              <div class="col">
                <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Nome Completo</label>
                <input type="text" name="nome" class="form-control" minlength="10" Completo" value="<?= $row_usuario['nome'] ?>" required>
              </div>
              <div class="col">
                <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">CPF Titular:</label>
                <input type="text" name="cpf_titular" cpf value="<?php echo $_SESSION['cpf'] ?>" class="form-control" Completo" readonly>
              </div>

              <div class="col">
                <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">CNS-CARTAO SUS </label>
                <input type="text" name="cns" class="form-control" minlength="15" maxlength="15" value="<?= $row_usuario['cns'] ?>" do cart??o">
              </div>
              <br>
            </div>
            <br>
            <div class="row">

              <div class="col">
                <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Estado Civil:</label>
                <select class="form-control" name="estadocivil" value="<?= $row_usuario['estadocivil'] ?>" required>
              </div>
              <option <?= $row_usuario['estadocivil'] == 'casado' ? 'selected' : '' ?>>casado</option>
              <option <?= $row_usuario['estadocivil'] == 'solteiro' ? 'selected' : '' ?>>solteiro</option>
              <option <?= $row_usuario['estadocivil'] == 'viuvo' ? 'selected' : '' ?>>viuvo</option>
              <option <?= $row_usuario['estadocivil'] == 'divorciado' ? 'selected' : '' ?>>divorciado</option>
              <option disabled value="">Selecione</option>
              </select>
            </div>
            <div class="col">
              <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Data Nascimento</label>
              <input type="text" name="datas" id="data" class="form-control" MM/ANO" value="<?= $row_usuario['datas'] ?>" required>
            </div>
            <div class="col">
              <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Nome da M??e</label>
              <input type="text" name="mae" class="form-control" minlenght="10" da Mae" value="<?= $row_usuario['mae'] ?>" required>
            </div>
        </div>
        <br>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>

    </div>
  </div>
  </div>
<?php
  $cont++;
}
?>

<form action="" method="">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
          <img style="margin: 0 auto;" src="http://unidentisdigital.com.br/assets/img/LOGO.png" alt="" width="240">
          <br><br>
          <h4 style="text-align: center">Um e-mail foi enviado para <?php echo $_SESSION['emaildependente'] ?> com o c??digo de confirma????o da inclus??o que dever?? ser informado no campo abaixo</h4>
          <input class="form-control" name="codigo" title="Digite o C??digo" o C??digo">
        </div>
        <div class="modal-footer">
          <a href="incluirdependentes"> <button type="button" class="btn btn-primary">Sair</button></a>
        </div>
      </div>
    </div>
  </div>
  <script src="./assets/js/isRequired.js"></script>

</html>