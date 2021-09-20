<?php 
error_reporting(0);
ini_set(“display_errors”, 0 );
require __DIR__ . '/vendor/autoload.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('include/head.php'); ?>
    <link rel="stylesheet" href="./assets/css/cadastro.css" />
    <style>      
      input,
      select {
        border: 1px solid #606060 !important;
        background-color: #b3b3b3;
        margin-left: 5%;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <?php include('include/header.php'); ?>
    <?php include('include/sidebar.php'); ?>
    <div class="main-container" style='background-color: #eeeeee; margin-top: 1.5rem;'>
    <div class="pd-ltr-20 height-100-p xs-pd-20-10">
      <div class="min-height-200px CadFotos">
        <div class="page-header">
          <div class="row">
            <?php echo '<h5 style="font-size: .9rem;width:98vw;margin-left: 1%;"><span style="font-size:1rem;font-weight:bold;color:#606060;">INCLUIR PROPOSTA</span> | VALOR TOTAL : R$'.$_SESSION['precototal'] .' | PLANO : ' .  $_SESSION['plano'] .' | DEPENDENTES :  '. $_SESSION['cont'] .  '</h5>'?> 
            <br>
            <div
              class="inline"
              style="
                display:-webkit-inline-box;margin-left:1%;margin-top:1%;
              "
            >
              <h4
                id="h4"
                style="
                  color:#606060;padding-top:2px;font-size: 1rem;line-height: 1.5rem;
                "
              >
                Escolha o Plano:
              </h4>
              <input
                id="plano"
                class="form-control"
                style="
                  background-color: #b3b3b3 !important;height: calc(2rem + 2px) !important;
                "
                value="<?php echo $_SESSION['plano']?>"
                readonly
              />
              <br />
            </div>
          </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div style="background-color: #f6f6f6 !important;
            padding: 2rem;
            padding-top: 1rem;
            margin: .5rem auto;
            box-shadow: 0px 0px 8px rgb(0 0 0 / 10%);
            position: relative;
            ">
          <div class="flexLabel">
            <label class="labelInput">Incluir Arquivos</label>
            <hr/>
          </div>
          <div id="branco"></div>

          <form
            method="POST"
            action="enviofotos.php"
            enctype="multipart/form-data"
          >
            <div class="drop-zone">
              <span style="color: white" class="drop-zone__prompt"
                ><i
                  style="font-size: 3.5rem; padding: 11%; color: #606060"
                  class="fa fa-download"
                ></i
                ><br/>
                <div class="fundoazul">RG FRENTE</div></span
              >
              <input
                type="file"
                name="arquivo10[]"
                multiple="multiple"
                class="drop-zone__input"
                required
              />
            </div>

            <div class="drop-zone">
              <span style="color: white" class="drop-zone__prompt"
                ><i
                  style="font-size: 3.5rem; padding: 11%; color: #606060"
                  class="fa fa-download"
                ></i
                ><br />
                <div class="fundoazul">RG VERSO</div></span
              >
              <input
                type="file"
                name="arquivo1[]"
                multiple="multiple"
                class="drop-zone__input"
                required
              />
            </div>

            <div class="drop-zone">
              <span style="color: white" class="drop-zone__prompt"
                ><i
                  style="font-size: 3.5rem; padding: 11%; color: #606060"
                  class="fa fa-download"
                ></i
                ><br />
                <div class="fundoazul">CPF</div></span
              >
              <input
                type="file"
                name="arquivo2[]"
                multiple="multiple"
                class="drop-zone__input"
                required
              />
            </div>

            <div class="drop-zone">
              <span style="color: white" class="drop-zone__prompt"
                ><i
                  style="font-size: 3.5rem; padding: 7%; color: #606060"
                  class="fa fa-download"
                ></i
                ><br />
                <div class="fundoazul">COMPROVANTE DE RESIDÊNCIA</div></span
              >
              <input
                type="file"
                name="arquivo3[]"
                multiple="multiple"
                class="drop-zone__input"
                required
              />
            </div>

            <?php if( $_SESSION['plano'] != 'UNIDENTISVIPBOLETO'){
                      ?>

            <div class="drop-zone">
              <span style="color: white" class="drop-zone__prompt"
                ><i
                  style="font-size: 3.5rem; padding: 11%; color: #606060"
                  class="fa fa-download"
                ></i
                ><br />
                <div class="fundoazul">CARTÃO</div></span
              >
              <input
                type="file"
                name="arquivo4[]"
                multiple="multiple"
                class="drop-zone__input"
                required
              />
            </div>
            <?php }?>

            <div class="drop-zone">
              <span style="color: white" class="drop-zone__prompt"
                ><i
                  style="font-size: 3.5rem; padding: 11%; color: #606060"
                  class="fa fa-download"
                ></i
                ><br />
                <div class="fundoazul">OUTRO</div></span
              >
              <input
                type="file"
                name="arquivo5[]"
                multiple="multiple"
                class="drop-zone__input"
                required
              />
            </div>
            <br />
            <div style="overflow: auto;clear: both;"></div>
            <br /><br />

            <input
              name="SendCadImg"
              type="submit"
              id="submit"
              class="btn btn-success"
              value="Avançar"
            />
          </form>
        </div>
        <?php include('include/footer.php'); ?>
        </div>
      </div>

      <?php include('include/script.php'); ?>
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
          } else {
            thumbnailElement.style.backgroundImage = null;
          }
        }
      </script>
    </div>
  </body>
</html>
