<!DOCTYPE html>
<html>
  <head>
    <!-- <script
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
    </script> -->
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
      
      .containerLinks{
        background-color: #eeeeee;
      }

      .containerLinks .flexLabel{
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .containerLinks .flexLabel .labelInput{
        font-size: .9rem;
        white-space: nowrap;
        padding-right: 1rem;
        font-weight: bold;
        color: #606060;
        text-transform: uppercase;
      }

      .containerLinks .flexLabel hr{
        position: relative;
        top: -.15rem;
        display: block;
        width: 100%;
        height: 1px;
        background-color: #606060;
      }

      .containerLinks .clearfix{
        margin-bottom: .5rem;
        text-transform: uppercase;
        letter-spacing: .05rem;
      }
      .containerLinks .clearfix h4{
        font-size: 1.8rem;
        color: #606060;
      }
      .containerLinks .input-group input{
        background-color: #f6f6f6 !important;
        width: 50%;
        border-top-right-radius: .5rem !important;
        border-bottom-right-radius: .5rem !important;
        border-radius: .5rem;
        margin: .5rem 0;
      }

      div.containerBG{
        background-color: #f6f6f6;
        margin-bottom: 1.5rem;
        padding-top: 1.5rem;
        border-radius: 10px; 
      }
      div.containerBG .flexIcon{
        display: flex;
        margin: 0 .5rem;
        justify-content: space-around;
        gap: .25rem;
        align-items: center;
        font-size: .9rem;
        color: #606060;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
      }

      div.containerBG .flexIcon i{
        font-size: 2rem;
      }
      
      div.containerBG .flexIcon:hover a,
      div.containerBG .flexIcon:hover i,
      div.containerBG .flexIcon:hover{
        color: #60606099;
      }

      @media (max-width: 678px) {
        .containerLinks .clearfix h4{
          font-size: 1.2rem;
          color: #606060;
        }
        .containerLinks .input-group input{
          display: block;
          width: 100%;
        }
        div.containerBG .flexIcon{
          margin: .5rem auto;
        }
      }

    </style>
    
    <div class="main-container">
      <div
        style="margin-top: .5%;"
        class="
          pd-ltr-20
          customscroll customscroll-10-p
          height-100-p
          xs-pd-20-10
        "
      >
        <!-- Default Basic Forms Start -->
        <div class="pd-20 border-radius-4 mb-40 containerLinks">
          <div class="clearfix">
            <div class="pull-left">
              <h4 class="nome">Link Vendedores</h4>
            </div>
            <br />
          </div>
          <div class="row">
            <div class="col-md-12 containerBG">
              <div class="flexLabel">
                <label class="labelInput">Pessoa Física</label>
                <hr>
              </div>
              <!-- flexLabel -->
              <div class="input-group">
                <input
                  type="text"
                  id="texto"
                  class="form-control"
                  value="unidentisdigital.com.br/pessoafisica?vendedor=<?PHP echo $_SESSION['usuario']?>"
                  readonly
                />
                
                <label class="flexIcon">
                  <a
                    target="_blank"
                    href="https://api.whatsapp.com/send?text=unidentisdigital.com.br/pessoafisica?vendedor=<?PHP echo $_SESSION['usuario']?>"
                    ><i
                      class="fa fa-whatsapp"
                    ></i
                  ></a>
                  <a target="_blank" href='https://api.whatsapp.com/send?text=unidentisdigital.com.br/pessoafisica?vendedor=<?PHP echo $_SESSION['usuario']?>'><span>Whatsapp</span></a>
                </label>
                <!-- FlexIcon -->

                <label class="flexIcon">
                  <i
                    class="fa fa-files-o"
                    id="btnCopiar"
                    aria-hidden="true"
                  ></i>
                  <span id="btnCopiar_0" >Copiar</span>
                </label>
                <!-- flexIcon -->

              </div>
            </div>

            <div class="col-md-12 containerBG">
              <div class="flexLabel">
                <label class="labelInput">Servidor Público</label>
                <hr>
              </div>
              <div class="input-group">
                <input
                  type="text"
                  id="texto2"
                  class="form-control"
                  value="unidentisdigital.com.br/servidorpublico?vendedor=<?php echo $_SESSION['usuario'] ?>"
                  readonly
                />
                
                <label class="flexIcon">
                  <a
                    target="_blank"
                    href="https://api.whatsapp.com/send?text=unidentisdigital.com.br/servidorpublico?vendedor=<?php echo $_SESSION['usuario'] ?>"
                    ><i
                      class="fa fa-whatsapp"
                    ></i
                  ></a>
                  <a target="_blank" href='https://api.whatsapp.com/send?text=unidentisdigital.com.br/servidorpublico?vendedor=<?php echo $_SESSION['usuario'] ?>'><span>Whatsapp</span></a>
                </label>
                <label class="flexIcon">
                  <i
                    class="fa fa-files-o"
                    id="btnCopiar2"
                    aria-hidden="true"
                  ></i>
                  <span id="btnCopiar_1">Copiar</span>
                </label>
              </div>
            </div>

            <div class="col-md-12 containerBG">
              <div class="flexLabel">
                <label class="labelInput">Dependentes</label>
                <hr>
              </div>
              <div class="input-group">
                <input
                  type="text"
                  id="texto3"
                  class="form-control"
                  value="unidentisdigital.com.br/incluirdependentes?vendedor=<?php echo $_SESSION['usuario'] ?>"
                  readonly
                />
                <label class="flexIcon">
                  <a
                    target="_blank"
                    href="https://api.whatsapp.com/send?text=unidentisdigital.com.br/incluirdependentes?vendedor=<?php echo $_SESSION['usuario'] ?>"
                    ><i
                      class="fa fa-whatsappfa fa-whatsapp"
                    ></i
                    ></a>
                    <a target="_blank" href="https://api.whatsapp.com/send?text=unidentisdigital.com.br/incluirdependentes?vendedor=<?php echo $_SESSION['usuario'] ?>"><span>Whatsapp</span></a>
                </label>
                <label class="flexIcon">
                  <i
                    class="fa fa-files-o"
                    id="btnCopiar3"
                    aria-hidden="true"
                  ></i>
                  <span id="btnCopiar_2">Copiar</span>
                </label>

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
      $("#btnCopiar_0").on("click", function () {
        var texto = document.getElementById("texto");
        texto.select();
        document.execCommand("Copy");
      });
      $("#btnCopiar2").on("click", function () {
        var texto = document.getElementById("texto2");
        texto.select();
        document.execCommand("Copy");
      });
      $("#btnCopiar_1").on("click", function () {
        var texto = document.getElementById("texto2");
        texto.select();
        document.execCommand("Copy");
      });
      $("#btnCopiar3").on("click", function () {
        var texto = document.getElementById("texto3");
        texto.select();
        document.execCommand("Copy");
      });
      $("#btnCopiar_2").on("click", function () {
        var texto = document.getElementById("texto3");
        texto.select();
        document.execCommand("Copy");
      });
    </script>
  </body>
</html>
