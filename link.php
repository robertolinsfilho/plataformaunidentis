<!DOCTYPE html>
<html>
  <head>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
      $("#telefone, #celular").mask("(00) 00000-0000");
    </script>
    <script type="text/javascript">
      $("#cpf").mask("000.000.000-00");
    </script>
    <?php include('include/head.php'); ?>
    <!-- <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    /> -->
  </head>
  <body>
  	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
    <style>
      .col-md-6,
      .col-md-5,
      .col-md-3,
      .col-md-4 {
        background-color: #f6f6f6;
        padding: 8px;
        border-radius: 5px;
      }
      input,
      select {
        border: 1px solid #606060 !important;
      }
      .nome {
        color: #606060;
        font-weight: bold;
      }
    </style>
    
    <div class="main-container">
      <div
        style="margin-top: 2.5%;"
        class="
          pd-ltr-20
          customscroll customscroll-10-p
          height-100-p
          xs-pd-20-10
        "
      >
        <!-- Default Basic Forms Start -->
        <div class="pd-20 border-radius-4 box-shadow mb-30">
          <div class="clearfix">
            <div class="pull-left">
              <h4 class="nome">Link Vendedores</h4>
            </div>
            <br />
          </div>

          <br />

          <br />
          <div class="row">
            <div class="col-md-12">
              <label>Pessoa Física:</label>
              <hr
                style="
                  width: 85%;
                  position: relative;
                  margin-top: -2%;
                  margin-left: 15%;
                  font-weight: bold;
                  height: 1px;
                  background-color: #606060;
                "
                size="50"
              />
              <div class="input-group">
                <input
                  type="text"
                  id="texto"
                  class="form-control"
                  value="unidentisdigital.com.br/pessoafisica?vendedor=<?PHP echo $_SESSION['usuario']?>"
                  readonly
                />
                <i
                  class="fa fa-files-o"
                  id="btnCopiar"
                  style="font-size: 31px; padding: 5px; cursor: pointer"
                  aria-hidden="true"
                ></i>
                <a
                  target="_blank"
                  href="https://api.whatsapp.com/send?text=unidentisdigital.com.br/pessoafisica?vendedor=<?PHP echo $_SESSION['usuario']?>"
                  ><i
                    class="fa fa-whatsapp"
                    style="font-size: 31px; padding: 5px"
                  ></i
                ></a>
              </div>
            </div>

            <div class="col-md-12">
              <label>Servidor Público:</label>
              <hr
                style="
                  width: 85%;
                  position: relative;
                  margin-top: -2%;
                  margin-left: 15%;
                  font-weight: bold;
                  height: 1px;
                  background-color: #606060;
                "
                size="50"
              />
              <div class="input-group">
                <input
                  type="text"
                  id="texto2"
                  class="form-control"
                  value="unidentisdigital.com.br/servidorpublico?vendedor=<?php echo $_SESSION['usuario'] ?>"
                  readonly
                />
                <i
                  class="fa fa-files-o"
                  id="btnCopiar2"
                  style="font-size: 31px; padding: 5px; cursor: pointer"
                  aria-hidden="true"
                ></i>
                <a
                  target="_blank"
                  href="https://api.whatsapp.com/send?text=unidentisdigital.com.br/servidorpublico?vendedor=<?php echo $_SESSION['usuario'] ?>"
                  ><i
                    class="fa fa-whatsapp"
                    style="font-size: 31px; padding: 5px"
                  ></i
                ></a>
              </div>
            </div>

            <div class="col-md-12">
              <label>Dependentes:</label>
              <hr
                style="
                  width: 85%;
                  position: relative;
                  margin-top: -2%;
                  margin-left: 15%;
                  font-weight: bold;
                  height: 1px;
                  background-color: #606060;
                "
                size="50"
              />
              <div class="input-group">
                <input
                  type="text"
                  id="texto3"
                  class="form-control"
                  value="unidentisdigital.com.br/incluirdependentes?vendedor=<?php echo $_SESSION['usuario'] ?>"
                  readonly
                />
                <i
                  class="fa fa-files-o"
                  id="btnCopiar3"
                  style="font-size: 31px; padding: 5px; cursor: pointer"
                  aria-hidden="true"
                ></i>
                <a
                  target="_blank"
                  href="https://api.whatsapp.com/send?text=unidentisdigital.com.br/incluirdependentes?vendedor=<?php echo $_SESSION['usuario'] ?>"
                  ><i
                    class="fa fa-whatsappfa fa-whatsapp"
                    style="font-size: 31px; padding: 5px"
                  ></i
                ></a>
              </div>
            </div>
          </div>

          <!-- Form grid End -->

          <!-- Input Validation Start -->

          <!-- Input Validation End -->
        </div>
        <?php include('include/footer.php'); ?>
      </div>
    </div>
    <?php include('include/script.php'); ?>
    <script>
      $("#btnCopiar").on("click", function () {
        var texto = document.getElementById("texto");
        texto.select();
        document.execCommand("Copy");
      });
      $("#btnCopiar2").on("click", function () {
        var texto = document.getElementById("texto2");
        texto.select();
        document.execCommand("Copy");
      });
      $("#btnCopiar3").on("click", function () {
        var texto = document.getElementById("texto3");
        texto.select();
        document.execCommand("Copy");
      });
    </script>
  </body>
</html>
