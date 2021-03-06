<?php
session_start();
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
  // Usuário não logado! Redireciona para a página de login
  header("Location: login");
  exit;
}
include('include/head.php');
?>

<link rel="stylesheet" href="./assets/css/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet">
<style>
  #mostra {

    display: none;
  }

  #msg {

    display: none;
  }

  .modal-header,
  .btn {
    background-color: #023bbf
  }

  .modal-title,
  .close {
    color: white;
    font-family: 'Poppins', sans-serif;
  }

  h2 {
    font-family: 'Poppins', sans-serif;
  }

  button {
    background-color: #284ebf;
  }
</style>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="session.php" method="POST">
        <div class="modal-header">
          <h4 style="color: white">Unidentis</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

          <h4 style='margin-top: 1rem;'>Incluir Proposta</h4>
          <br />
          <h5 style="color: #606060; font-weight: bold; text-align: left; line-height: 2.5rem;">Tipo de Cliente:</h5>
          <select id="change" class="form-control" name="fabricante">
            <option value="1">Pessoa Fisica</option>
            <option value="2">Servidor Publico</option>
          </select>
          <br />
          <h5 style="color: #606060; font-weight: bold; text-align: left; line-height: 2.5rem;">Localidade:</h5>
          <select name="produtos" class="form-control"></select>

          <div class="hidden produtos-f1">
            <option value="PB">Grupo de Municipios PB</option>
            <option value="RN">Grupo de Municipios RN</option>
          </div>

          <div class="hidden produtos-f2">
            <option value="PREFEITURA MUNICIPAL DE JOAO PESSSOA">
              PREFEITURA MUNICIPAL DE JOAO PESSOA
            </option>
            <option value="PREFEITURA MUNICIPAL DE SANTA RITA">
              PREFEITURA MUNICIPAL DE SANTA RITA
            </option>
            <option value="GOVERNO DO ESTADO PB">GOVERNO DO ESTADO PB</option>
            <option value="PREFEITURA MUNICIPAL DE CABEDELO">
              PREFEITURA MUNICIPAL DE CABEDELO
            </option>
            <option value="SEMOB">SEMOB</option>
            <option value="EMLUR">EMLUR</option>
            <option value="SECRETARIA DE SAUDE DO MUNICIPIO">
              SECRETARIA DE SAUDE DO MUNICIPIO
            </option>
            <option value="FUNDAC">FUNDAC</option>
          </div>
          <br />
          <div id="mostra">
            <h4>Margem Resevada?</h4>
            <br />
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="sim" />
              <label class="form-check-label" for="flexRadioDefault1">
                SIM
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="nao" />
              <label class="form-check-label" for="flexRadioDefault1">
                NAO
              </label>
            </div>
            <div id="msg">
              <h6>LIGAR PARA 3044-3020, COM CPF E MATRÍCULA EM MÃOS!</h6>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit" id="prosseguir" style="font-weight: 500 !important;">
            Prosseguir
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!DOCTYPE html>
<html>

<head>
  <?php include('include/head.php'); ?>
  <link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/build/jquery.steps.css">
</head>

<body>
  <?php include('include/header.php'); ?>
  <?php include('include/sidebar.php'); ?>
  <div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="title">
                <h4>Incluir Propostas</h4>
              </div>

            </div>

          </div>
        </div>




        <!-- success Popup html Start -->
        <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body text-center font-18">
                <h3 class="mb-20">Form Submitted!</h3>
                <div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              </div>
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-weight: 500 !important;">Feito</button>
              </div>
            </div>
          </div>
        </div>
        <!-- success Popup html End -->
      </div>
      <?php include('include/footer.php'); ?>
    </div>
  </div>
  <?php include('include/script.php'); ?>
  <script src="src/plugins/jquery-steps/build/jquery.steps.js"></script>
  <script>
    $('#change').change(function() {
      var valor = $('#change').val();
      if (valor == 2) {
        $('#mostra').css('display', 'block')
      } else {
        $('#mostra').css('display', 'none')
      }

    });

    $('#nao').click(function() {
      var valor = $('#nao').val();
      if (valor = 'NAO') {
        $('#msg').css('display', 'block');
        $("#prosseguir").hide();


      }

    });
    $('#sim').click(function() {
      var valor = $('#sim').val();
      if (valor = 'NAO') {
        $('#msg').css('display', 'none');
        $("#prosseguir").show();


      }

    });



    $(function() {

      $('.hidden').hide();

      $('select[name=produtos]').html($('div.produtos-f1').html());


      $('select[name=fabricante]').change(function() {
        var id = $('select[name=fabricante]').val();

        $('select[name=produtos]').empty();

        $('select[name=produtos]').html($('div.produtos-f' + id).html());


      });

      $('select[name=produtos]').html($('div.produtos-f1').html());


      $('select[name=fabricante]').change(function() {
        var id = $('select[name=fabricante]').val();

        $('select[name=produtos]').empty();

        $('select[name=produtos]').html($('div.produtos-f' + id).html());


      });


    });






    $(document).ready(function() {
      $('#myModal').modal('show');
    });
  </script>




</body>

</html>