<?php 
error_reporting(0);
ini_set(“display_errors”, 0 );
require __DIR__ . '/vendor/autoload.php';

?>
<!DOCTYPE html>
<html>
<head>
<style>
.drop-zone {
  width: 300px;
  height: 200px;
  padding: 20px;
  display: inline;
  align-items: center;
  justify-content: center;
  text-align: center;
  font-family: "Quicksand", sans-serif;
  font-weight: 500;
  font-size: 20px; 
  cursor: pointer;
  color: #023bbf;
  border: 4px solid #606060;
  border-radius: 10px;
  float:left;
  margin-left:2%;
  margin-top:2%;
  overflow: auto;
  

}


.drop-zone--over {
  border-style: solid;
  
}

.drop-zone__input {
  display: none;
  
}

.drop-zone__thumb {
  width: 100%;
  height: 100%;
  border-radius: 10px;
  overflow: hidden;
  background-color: #cccccc;
  background-size: cover;
  position: relative;
}

.drop-zone__thumb::after {
  content: attr(data-label);
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 5px 0;
  color: #ffffff;
  background: rgba(0, 0, 0, 0.75);
  font-size: 14px;
  text-align: center;
}
#top{
  margin-left:3%;
}
#h5{
  margin-left:2%;
  margin-top:4%;
}

input, select{
    	border: 1px solid #606060 !important; 
      
    	background-color:#b3b3b3
		;margin-left:5%;
		text-align:center;
    
    }
.fundoazul{
  background-color: #4177d0 ;
}
#submit{
  margin-left:85%;
  margin-top:2%;
  background-color: #4177d0 ;
}

@media screen and (max-device-width: 720px) {
  .text-blue1{
    margin-left: 5%;
    margin-top: 4%;
    position: absolute;
    font-size: 18px;
    color: #3284f1;
    width: 30%;
    height: 100px;
    background-color: #cccccc;
  text-align: center;
  padding-top: 30px;
  border-radius: 5px;
  

}
.text-blue2{
    margin-left: 5%;
    margin-top: 4%;
    position: absolute;
    font-size: 16px;
    color: #3284f1;
    width: 30%;
    height: 100px;
    background-color: #cccccc;
  text-align: center;
  padding-top: 20px;
  border-radius: 5px;
  

}
#submit{
  margin-left:11%;
  width:80%;
  margin-top:5%;
  
}
.drop-zone {
  max-width: 350px;
  height: 200px;
  padding: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  font-family: "Quicksand", sans-serif;
  font-weight: 500;
  font-size: 20px;
  cursor: pointer;
  color: #cccccc;
  border: 2px solid #606060;
  border-radius: 10px;
margin-left: 2%;
 margin-top: 1%;
 position: relative;
 overflow: auto
}
#top{
  width:70%;
  margin-left:5%;
  margin-top:10%;
}
.brand-logo{
  margin-top:-15%
}
#h5{
  margin-left:10%;
  margin-top: 7%;
}
.inline{
  width:50%
}
}
</style>

	<?php include('include/head.php'); ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">


</head>
<body>
	<?php include('include/header.php'); ?>
  <?php include('include/sidebar.php'); ?>
	

  
<style>

</Style>
	<div  style="background-color: #f6f6f6 !important;" class="main-container">
		
			<div style="width: 96%;padding-left: 2%;" class="min-height-200px">
				<div class="page-header">
					<div class="row">
         
          <?php echo '<h5 id="h5" style="font-size:17px;font-weight:bold;width:120%;color:#606060">INCLUIR PROPOSTA | VALOR TOTAL : '.$_SESSION['precototal'] .' | PLANO : ' .  $_SESSION['plano'] .' | DEPENDENTES :  '. $_SESSION['cont'] .  '</h5>'?> 
          <div class="inline" style="display:-webkit-inline-box;margin-left:2%;margin-top:1%">
					<h4 id="h4"style="color:#606060;padding-top:7px; ">Escolha o Plano :</h4>
					<input id ="plano" class="form-control" style="background-color:#b3b3b3" value="<?php echo $_SESSION['plano']?>" readonly>
					<br>
	        </div>
          <div class="col-md-6 col-sm-12">
          
							<div class="title">
             
							</div>
							<br>
						</div>
						
					</div>
				</div>
        <br>
				<!-- Default Basic Forms Start -->
				<div  style="background-color: #ededed !important;" class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="inline" style="display:inline">
        <div class="clearfix">
						<div class="pull-left">
							<h4 style="color:#606060;font-weight:bold">Incluir Arquivos</h4>

						</div>
						<br>
					</div>
          <br>
						<hr style="width: 78%;position: relative;margin-top: -3.5%;margin-left: 23%;font-weight:bold;height:1px;background-color:#606060;" size = "50">
        </div>
					<br>
                    <div id="branco">
                    </div>
                   
           
                    <form method="POST" action="enviofotos.php" enctype="multipart/form-data" >
                   
                    <div class="drop-zone">
                        <span style="color:white" class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >RG FRENTE</div></span>                    
                        <input type="file" name="arquivo10[]" multiple="multiple"class="drop-zone__input" required>
                    </div>
                    
                    
                    <div class="drop-zone">
                        <span style="color:white" class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >RG VERSO</div></span>
                        <input type="file" name="arquivo1[]"  multiple="multiple" class="drop-zone__input" required>
                    </div>
                    
                   
                    <div class="drop-zone">
                        <span style="color:white"  class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul" >CPF</div></span>
                        <input type="file" name="arquivo2[]"  multiple="multiple" class="drop-zone__input" required>
                    </div>
                    
                   
                    <div class="drop-zone">
                        <span style="color:white"  class="drop-zone__prompt"><i style="font-size: 297%;padding: 7%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >COMPROVANTE DE RESIDÊNCIA</div></span>
                        <input type="file" name="arquivo3[]"  multiple="multiple" class="drop-zone__input" required>
                    </div>
                  
                    <?php if( $_SESSION['plano'] != 'UNIDENTISVIPBOLETO'){
                      ?>
                   
                    <div class="drop-zone">
                        <span style="color:white"  class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >CARTÃO</div></span>
                        <input type="file" name="arquivo4[]"  multiple="multiple" class="drop-zone__input" required>
                    </div>
                      <?php }?>  
                    
                  
                    <div class="drop-zone">
                        <span style="color:white" class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul" >OUTRO</div></span>
                        <input type="file" name="arquivo5[]"  multiple="multiple" class="drop-zone__input" required>
                    </div>
                    <br>
                  


            <br><br>
            
            <input name="SendCadImg" type="submit" id="submit" class="btn btn-success"value="Avançar">

        </form>
			</div>
			<?php include('include/footer.php'); ?>
		</div>

	<?php include('include/script.php'); ?>
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
  } else {
    thumbnailElement.style.backgroundImage = null;
  }
}

 
</script>
</body>
</html>