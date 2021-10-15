<?php
error_reporting(0);
ini_set('display_errors', 0);
require __DIR__ . '/vendor/autoload.php';

?>
<!DOCTYPE html>
<html>

<head>
  <?php include('include/head.php'); ?>
  <link rel="stylesheet" href="./assets/css/cadastro.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <style>
    #minhaDiv {
      display: none;

    }

    .col-md-6,
    .col-md-5,
    .col-md-3,
    .col-md-4,
    .col-md-2 {
      background-color: #f6f6f6;
      padding: 4px;
      border-radius: 5px;
    }

    h5.proposta {
      font-size: .9rem;
      width: auto;
      min-width: 40%;
      margin-left: 1%;
      margin-bottom: -.25rem;
      display: flex;
      justify-content: space-between;
      font-size: .75rem;
    }

    h5.proposta>span {
      color: #606060;
      padding: 0 .5rem;
      font-size: 1.75rem;
      line-height: .5rem;
      font-weight: 300;
      position: relative;
      top: 0;
    }

    div.selectCamp {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      overflow: hidden;
    }

    select[name=plano] {
      max-width: 340px;
      padding-left: 0.25rem;
    }

    @media (max-width: 500px) {
      .proposta {
        font-size: .55rem !important;
        flex-wrap: wrap !important;
        margin-bottom: .15rem !important;
        justify-content: start !important;
      }

      .proposta span {
        font-size: 1rem !important;
        line-height: .5rem !important;
        padding: 0 .2rem !important;
      }

      div.selectCamp {
        flex-wrap: wrap;
        gap: 1rem;
      }
    }
  </style>
  <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
  <link rel="stylesheet" href="./assets/css/cadastro.css">
</head>

<body>
  <?php include('include/header.php'); ?>
  <?php include('include/sidebar.php'); ?>

  <div class="main-container" style='background-color: #eeeeee; margin-top: 1.5rem;'>
    <div class="
          pd-ltr-20
          height-100-p
          xs-pd-20-10
        ">
      <div class="min-height-200px personalData">
        <div class="page-header">
          <div class="row">
            <h5 class="proposta">
              <p style="color: #606060; font-weight: 600;">INCLUIR PROPOSTA</p> <span>|</span>VALOR TOTAL: <p id='valorPlano'> <?= $_SESSION['precototal'] ? $_SESSION['precototal'] : '0' ?></p> <span>|</span> PLANO: <p id='qPlano'> <?= $_SESSION['plano'] ?> </p> <span>|</span>BENEFICIÁRIOS: <?= $_SESSION['cont'] + 1 ?>
            </h5>
            <br>
            <div class="selectCamp pl-2 pb-2">
              <h4 id='inlineH4' style="color:#606060;white-space: nowrap;font-size: 1.65rem;">ESCOLHA O PLANO: </h4>
              <div class="col-md-10">
                <div class="form-group" style="margin: 0 !important;">
                  <select name="plano" id="plano" class="form-control custom-select" style=" -webkit-appearance: none;-moz-appearance: none; appearance: none; background: url(http://www.webcis.com.br/images/imagens-noticias/select/ico-seta-appearance.gif) no-repeat; background-position: -1000px;" disabled>
                    <option value="<?php echo $_SESSION['plano'] ?>"> <?php echo $_SESSION['plano'] ? $_SESSION['plano'] : 'teste' ?></option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 divPai" style="padding: 0px 2rem; padding-top: 20px; position:relative;">
          <div class="flexLabel">
            <label class="labelInput">Incluir Arquivos</label>
            <hr />
          </div>
          <div id="branco"></div>

          <form method="POST" action="enviofotos.php" enctype="multipart/form-data">
            <div class="row justify-content-center">
              <div class="d-flex ">
                <div class="drop-zone">
                  <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                    <div class="fundoazul">RG FRENTE</div>
                  </span>
                  <input type="file" name="arquivo10[]" multiple="multiple" class="drop-zone__input" required />
                </div>

                <div class="drop-zone">
                  <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                    <div class="fundoazul">RG VERSO</div>
                  </span>
                  <input type="file" name="arquivo1[]" multiple="multiple" class="drop-zone__input" required />
                </div>

                <div class="drop-zone">
                  <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                    <div class="fundoazul">CPF</div>
                  </span>
                  <input type="file" name="arquivo2[]" multiple="multiple" class="drop-zone__input" required />
                </div>
              </div>
              <div class="d-flex">
                <div class="drop-zone">
                  <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                    <div class="fundoazul">COMPROVANTE DE RESIDÊNCIA</div>
                  </span>
                  <input type="file" name="arquivo3[]" multiple="multiple" class="drop-zone__input" required />
                </div>

                <?php if ($_SESSION['plano'] != 'UNIDENTISVIPBOLETO') {
                ?>

                  <div class="drop-zone">
                    <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                      <div class="fundoazul">CARTÃO</div>
                    </span>
                    <input type="file" name="arquivo4[]" multiple="multiple" class="drop-zone__input" required />
                  </div>
                <?php } ?>

                <div class="drop-zone">
                  <span style="color: white" class="drop-zone__prompt"><i style="font-size: 3.5rem; padding: 11%; color: #606060" class="fa fa-download"></i><br />
                    <div class="fundoazul">OUTRO</div>
                  </span>
                  <input type="file" name="arquivo5[]" multiple="multiple" class="drop-zone__input" required />
                </div>
              </div>

              <input name="SendCadImg" type="submit" id="avanca" class="btn btn-success saveBtn" style="top: -3rem; padding: 0.3rem 0.5rem;" value="Avançar"/>
            </div>
          </form>
        </div>
        <?php include('include/footer.php'); ?>
      </div>
    </div>

    <?php include('include/script.php'); ?>
    <script>
          const valuePlan = parseFloat(document.querySelector("#valorPlano").innerText).toLocaleString("pt-BR", {
            style: 'currency',
            currency: 'BRL'
          });

          function toBRL() {
            document.querySelector("#valorPlano").innerHTML = valuePlan;
          }
          toBRL();
        </script>
    <script>
      document
        .querySelectorAll(".drop-zone__input")
        .forEach((inputElement) => {
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
        let thumbnailElement =
          dropZoneElement.querySelector(".drop-zone__thumb");

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
  </div>
</body>

</html>