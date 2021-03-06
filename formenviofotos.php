<?php
session_start();
error_reporting(0);
include 'conexao.php';

if (!empty($_GET['key'])) {
  $forekey = $_GET['key'];
  
  $queryDadosGeraisAssociado = mysqli_query($conexao, "SELECT * from dadospessoais where forekey = '$forekey'");
  $dadosGeraisAssociado = mysqli_fetch_assoc($queryDadosGeraisAssociado);
  
  $queryDadosPrincipaisAssociado = mysqli_query($conexao, "SELECT * from dadosprincipais where forekey = '$forekey'");
  $dadosPrincipaisAssociado = mysqli_fetch_assoc($queryDadosPrincipaisAssociado);
  
  $queryDadosEndereco = mysqli_query($conexao, "SELECT * FROM endereco WHERE forekey = '$forekey'");
  $dadosEndereco = mysqli_fetch_assoc($queryDadosEndereco);

  $_SESSION['nome']     = $dadosGeraisAssociado['nome'];
  $_SESSION['cpf']      = $dadosGeraisAssociado['cpf'];
  $_SESSION['email']    = $dadosGeraisAssociado['email'];
  $_SESSION['celular']  = $dadosGeraisAssociado['celular'];
  $_SESSION['estado']   = $dadosGeraisAssociado['estado'];
  $_SESSION['plano']    = $dadosGeraisAssociado['plano'];
  $_SESSION['sus']      = $dadosGeraisAssociado['sus'];
  $_SESSION['vendedor1'] = $dadosGeraisAssociado['vendedor'];
  $_SESSION['sexo']        = $dadosGeraisAssociado['sexo'];
  $_SESSION['whats']       = $dadosGeraisAssociado['celular'];
  $_SESSION['rg']          = $dadosPrincipaisAssociado['rg'];
  $_SESSION['estadocivil'] = $dadosPrincipaisAssociado['estadocivil'];
  $_SESSION['datas']       = $dadosPrincipaisAssociado['datas'];
  $_SESSION['expedidor']   = $dadosPrincipaisAssociado['expedidor'];
  $_SESSION['mae']         = $dadosPrincipaisAssociado['mae'];
  $_SESSION['fixo']        = $dadosPrincipaisAssociado['fixo'];

  // Dados endereco
  $_SESSION['cep']         = $dadosEndereco['cep'];
  $_SESSION['rua']         = $dadosEndereco['rua'];
  $_SESSION['numero']      = $dadosEndereco['numero'];
  $_SESSION['bairro']      = $dadosEndereco['bairro'];
  $_SESSION['cidade']      = $dadosEndereco['cidade'];
  $_SESSION['estado']      = $dadosEndereco['estado'];
  $_SESSION['complemento'] = $dadosEndereco['complemento'];
} else {
  $forekey = $_SESSION['forekey'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">

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

    input,
    select {
      border: 1px solid #606060 !important;
      background-color: #b3b3b3;
      margin-left: 5%;
      text-align: center;
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
  </style>
  <link rel="stylesheet" href="./assets/css/cadastro.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
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
      <div class="flexLabel">
        <label class="labelInput">Envio de Arquivos</label>
        <hr>
      </div>
      <form method="POST" action="enviofotos2?key=<?=$forekey?>" enctype="multipart/form-data">
        <div class="row justify-content-center">
          <div class="d-flex">
            <div class="drop-zone">
              <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                <div class="fundoazul">RG FRENTE</div>
              </span>
              <input type="file" name="arquivo10[]" multiple="multiple" class="drop-zone__input" required />
            </div>

            <!-- <h4 class="text-blue1">RG Frente :</h4>
        <div class="drop-zone">
          <span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
          <input type="file" name="arquivo10[]" multiple="multiple" class="drop-zone__input">
        </div> -->
            <!-- <br> -->
            <div class="drop-zone">
              <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                <div class="fundoazul">RG VERSO</div>
              </span>
              <input type="file" name="arquivo1[]" multiple="multiple" class="drop-zone__input" required />
            </div>
            <!-- 
        <h4 class="text-blue1">RG Verso :</h4>
        <div class="drop-zone">
          <span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
          <input type="file" name="arquivo1[]" multiple="multiple" class="drop-zone__input">
        </div> -->

            <!-- <br> -->
            <div class="drop-zone">
              <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                <div class="fundoazul">CPF</div>
              </span>
              <input type="file" name="arquivo2[]" multiple="multiple" class="drop-zone__input" required />
            </div>
          </div>
          <!-- <h4 class="text-blue1">CPF :</h4>
        <div class="drop-zone">
          <span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
          <input type="file" name="arquivo2[]" multiple="multiple" class="drop-zone__input">
        </div>
        <br> -->
          <div class="d-flex">
            <div class="drop-zone">
              <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                <div class="fundoazul">COMPROVANTE DE RESID??NCIA</div>
              </span>
              <input type="file" name="arquivo3[]" multiple="multiple" class="drop-zone__input" required />
            </div>
            <!-- <h4 class="text-blue1">Comprovante de Resid??ncia :</h4>
        <div class="drop-zone">
          <span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
          <input type="file" name="arquivo3[]" multiple="multiple" class="drop-zone__input">
        </div>
        <br> -->
            <?php

            if ($_SESSION['plano'] != 'UNIDENTISVIPBOLETO') {

            ?>
              <div class="drop-zone">
                <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                  <div class="fundoazul">CART??O</div>
                </span>
                <input type="file" name="arquivo4[]" multiple="multiple" class="drop-zone__input" required />
              </div>
              <!-- <h4 class="text-blue1">Cart??o :</h4>
          <div class="drop-zone">
            <span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
            <input type="file" name="arquivo4[]" multiple="multiple" class="drop-zone__input">
          </div> -->
            <?php } ?>
            <!-- <br> -->
            <div class="drop-zone">
              <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                <div class="fundoazul">OUTRO</div>
              </span>
              <input type="file" name="arquivo5[]" multiple="multiple" class="drop-zone__input" required />
            </div>
            <!-- <h4 class="text-blue1">Outro :</h4>
        <div class="drop-zone">
          <span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
          <input type="file" name="arquivo5[]" multiple="multiple" class="drop-zone__input">
        </div>
        <br> -->
          </div>
        </div>
        <div class="row mt-4 pr-3">
          <input name="SendCadImg" type="submit" class="btn-get-started scrollto" value="Cadastrar">
        </div>

      </form>

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

<script>
  document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");

    dropZoneElement.addEventListener("click", (e) => {
      inputElement.click();
    });

    inputElement.addEventListener("change", (e) => {
      if (inputElement.files.length) {
        updateThumbnail(dropZoneElement, inputElement.files[0]);
      }
    });

    dropZoneElement.addEventListener("dragover", (e) => {
      e.preventDefault();
      dropZoneElement.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
      dropZoneElement.addEventListener(type, (e) => {
        dropZoneElement.classList.remove("drop-zone--over");
      });
    });

    dropZoneElement.addEventListener("drop", (e) => {
      e.preventDefault();

      if (e.dataTransfer.files.length) {
        inputElement.files = e.dataTransfer.files;
        updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
      }

      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  /**
   * Updates the thumbnail on a drop zone element.
   *
   * @param {HTMLElement} dropZoneElement
   * @param {File} file
   */
  function updateThumbnail(dropZoneElement, file) {
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

    // First time - remove the prompt
    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
      dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }

    // First time - there is no thumbnail element, so lets create it
    if (!thumbnailElement) {
      thumbnailElement = document.createElement("div");
      thumbnailElement.classList.add("drop-zone__thumb");
      dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.dataset.label = file.name;

    // Show thumbnail for image files
    if (file.type.startsWith("image/")) {
      const reader = new FileReader();

      reader.readAsDataURL(file);
      reader.onload = () => {
        thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
      };
    } else if (file.type == 'application/pdf') {
      thumbnailElement.style.backgroundImage = `url('./assets/img/icon_pdf.png')`;
      thumbnailElement.style.backgroundSize = '60%';
      thumbnailElement.style.backgroundRepeat = 'no-repeat';
      thumbnailElement.style.backgroundPosition = 'center';
    } else {
      thumbnailElement.style.backgroundImage = null;
    }
  }
</script>

</html>