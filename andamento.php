<?php
include("conexao.php");
session_start();
$result_usuario2 = "SELECT * from dadospessoais where email = '{$_SESSION['emailplataforma']}' ";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
 $cpf= $row_usuario2['cpf_titular'] ;
$result_usuario = "SELECT * from dependentes where cpf ='$row_usuario2[cpf]'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

$result_usuario1 = "SELECT * from contratocartao where email = '{$_SESSION['emailplataforma']}'";
$resultado_usuario1 = mysqli_query($conexao, $result_usuario1);
$row_usuario1 = mysqli_fetch_assoc($resultado_usuario1);


if($row_usuario2['status'] === 'Cancelado'   ) {
    header('Location: login2');
    
}
if ($row_usuario2['pagamento'] === 1){
$url = "http://unidentis.s4e.com.br/v2/api/associados?token=RWNTF7PUC87KRYRTVNFGP8XNYWJ4DQC4XWCGSHPW2F9FCURP82&cpfAssociado=$cpf";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($curl),true);
$resultado = $resultado['dados'];

$x=0;

foreach($resultado as $value){
   
    foreach($value['dependentes'] as $value1){
       
        foreach( (array)$value1['nomeSituacao'] as $value2){

        
            if($value2 !='CANCELADO'){
           
                $value2 = 1;
                
        
        
         }
        }
       
    }
  
}



if($value2 != 1){
           
    
  header('Location: login2');
  $_SESSION['sms'] = 'Plano Não Ativo';


}
}

exit();
if($row_usuario2['cpf'] == ''){
    header('Location: login2');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Unidentis</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/icon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: BizLand - v1.1.0
    * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
      
       .row{
           width: 100%;
          
           
           position: relative;
           margin-top: 1%;
       }

    </style>

<?php 
if($row_usuario2['status'] === 'Pag Pendente'){
$x = 33;
?>
<style>
      #icon1{
            color: green;
        }
</style>
<?php
}elseif($row_usuario2['pagamento'] = 1){
    $x = 66;
?>
<style>
      #icon1{
            color: green;
        }
        #icon2{
            color: green;
        }
</style>
<?php
}elseif($row_usuario2['status'] === 'Implantadas'){
    $x = 100;

?>
<style>
       #icon1{
            color: green;
        }
        #icon2{
            color: green;
        }
        #icon3{
            color: green;

        }
        
</style>
<?php
}
?>
<style>
#contrato{
    margin-left: 50%;
    margin-top: -14%;
   text-align: center;
}
#line{
    font-size: 100px;
    text-align: center;
    display: inline-flex;
   margin-top: 3%;
    margin-left:1%;
    align-items: center;
    align-content: center;
   
 
   
}
#centro{
    align-items: center;
    align-self: center;
    align-content: center;
    text-align: center;
    position: relative;
}
#titulo1, #titulo2, #titulo3{
    background-color: blue;
    width: 15%;
    height: 70px;
    position: relative;
    display: inline-block;
    margin-top: 6%;
    border-radius: 5px;
    text-align: center;
   padding-top: 1%;
    margin-left: 1%;
    align-items: center;
}
#titulo4{
    background-color: blue;
    width: 23%;
    height: 71px;
    position: relative;
    display: inline-block;
    margin-top:8%;
    border-radius: 5px;
    text-align: center;
   padding-top: 1%;
    margin-left: 1%;
    align-items: center;
    padding: 1%;
}

#a{
    padding-right: 9%;
    margin-left: 8%;
}
#a2{
    padding-right: 15%;
    margin-left: 11%;
}
h3{
    
    background-color: blue;
    color: white;
    border-radius: 5px;
    margin-top: 5%;
   
}
</style>
</head>

<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
        <div class="contact-info mr-auto">
            <i class="icofont-envelope"></i> <a href="mailto:contato@unidentis.com.br">contato@unidentis.com.br</a>
            <i class="icofont-phone"></i> 83 30443000

        </div>
        <div class="social-links">

            <a href="https://pt-br.facebook.com/unidentisplanoodontologico" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="https://www.instagram.com/unidentisplanoodontologico/?hl=en" class="instagram"><i class="icofont-instagram"></i></a>

            <a href="https://www.linkedin.com/company/unidentis-assitencia-odontologica-ltda/?originalSubdomain=br" class="linkedin"><i class="icofont-linkedin"></i></a>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">LOCALIZAÇÃO DAS CLÍNICAS </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4> Paraíba</h4>
                RUA DOUTOR OSÓRIO ABATH, N° 46, TORRE, JOÃO PESSOA-PB, CEP - 58040-750.<br>
                <h5>Contato Via WhatsApp:</h5>
                <a href="https://api.whatsapp.com/send/?phone=5583986176071&text&app_absent=0">Clique aqui</a><br><br><br>
                <h4>Rio Grande Do Norte </h4>
                HOSPITAL RIO GRANDE , N° 754, TIROL, NATAL- RN, CEP - 59020-100.<BR>
                <h5>Telefone: 84 4009-1000</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Primeiro Acesso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5> ACESSE COM O NÚMERO DO CPF DO TITULAR DO PLANO E A SENHA INICIAL 1234 </h5>
                <br>



            </div>
            <div class="modal-footer">
                <a href="https://unidentis.s4e.com.br/SYS/?TipoUsuario=1"> <button type="button" class="btn btn-secondary" >Acessar</button></a>

            </div>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<?php 
if($row_usuario2['status'] != 'Implantadas'){
?>
<section id="form2" style="margin-top : 1%"class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" style="background-color:aliceblue;" data-aos-delay="200">
    
        <h1 style="margin-top: -10%;">Progresso do <span> Plano</span></h1>
<a href ="//unidentisdigital.com.br/login2"><button  style="margin-left:90%"class="btn btn-danger">Sair</button></a>
        
        <br>
        <div class="row">
        <div class="col-md-3">
            <label>Nome :</label>
            <input type="text" value="<?php echo $row_usuario2['nome'] ?>"class="form-control" readonly>
        </div>
     
      
        <div class="col-md-3">
            <label>CPF :</label>
            <input type="text" value="<?php echo $row_usuario2['cpf'] ?>" class="form-control" readonly>
        </div>
       
        <br>
       
        <div class="col-md-3">
            <label>Email :</label>
            <input type="text" value="<?php echo $row_usuario2['email'] ?>" class="form-control" readonly>
        
        </div>
        <br>
        
        <div class="col-md-3">
            <label>Telefone :</label>
            <input type="text" class="form-control"  value="<?php echo $row_usuario2['celular'] ?> "readonly>
        </div>
        
       </div>

         <h4  style="margin-top: 5%;  text-align:left;color:blue;width:50% "><i id="icon1" class="fas fa-check"></i> Aguardando Confirmação de Pagamento</h4>
         <h4  style="margin-top: 3%;  text-align:left;color:blue;width:50% "><i id="icon2" class="fas fa-check"></i> Pagamento Confirmado</h4>
         <h4  style="margin-top: 3%;  text-align:left;color:blue;width:50% "><i id="icon3" class="fas fa-check"></i> Proposta  Concluída</h4>
      

   <a href="dom.php">   <div id="contrato">
      <h3 >Baixar contrato </h3>
      <i style="font-size:100px; text-align:center"class="far fa-copy"></i>
      </div>
   </a>
         <div style="margin-top: 12%; height: 40px;" class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $x?>%"></div>
</div>


         

      

 
    </div>






</section>
<?php
}else{
?>
<section id="form2" style="margin-top : 1%"class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" style="background-color:aliceblue;" data-aos-delay="200">
        <h1 style="margin-top: -10%;">Area do <span> Cliente</span></h1>
        <a href ="//unidentisdigital.com.br/login2"><button  style="margin-left:90%"class="btn btn-danger">Sair</button></a>
        <br>
        <div class="row">
        <div class="col-md-3">
            <label>Nome :</label>
            <input type="text" value="<?php echo $row_usuario2['nome'] ?>"class="form-control" readonly>
        </div>
     
      
        <div class="col-md-3">
            <label>CPF :</label>
            <input type="text" value="<?php echo $row_usuario2['cpf'] ?>" class="form-control" readonly>
        </div>
       
        <br>
       
        <div class="col-md-3">
            <label>Email :</label>
            <input type="text" value="<?php echo $row_usuario2['email'] ?>" class="form-control" readonly>
        
        </div>
        <br>
        
        <div class="col-md-3">
            <label>Telefone :</label>
            <input type="text" class="form-control"  value="<?php echo $row_usuario2['celular'] ?> "readonly>
        </div>
        
       </div>
      
 <div id=" centro">      
<div id="titulo1">
       <h3 >Contrato</h3>
     
       
</div>
<div id="titulo2">
       <h3 >Carteirinha</h3>
     
       
</div>
<div id="titulo3">
       <h3 >Proposta</h3>
     
       
</div>
<div id="titulo4">
       <h3 >Rede Credenciada</h3>
     
       
</div>
<div id="titulo4">
       <h3>Cancelar Plano</h3>
     
       
</div>
</div>
<br>
<div id="line">
    
  <a id='a' title="Clique Aqui"  href="./pdf/CONTRATO_IND_FAMILIAR.pdf"    i class="far fa-copy"></i></a>
     
    <a id='a' title="Clique Aqui"  href="//unidentis.com.br/carteirinha.php" target="_blank" i class="fas fa-credit-card"></i></a>
     
    <a id='a'  title="Clique Aqui"  href="dom.php" i class="far fa-copy"></i></a>
      
    <a id='a2'  title="Clique Aqui"  href="//unidentis.com.br/redecredenciada.php"  i class="far fa-map"></i></a>
    <a id='a2' title="Clique Aqui" href="proposta6.php?email=<?php echo $row_usuario2['email']?>" i class="fas fa-user-times"></i></a>

      </div>
   
    
      
    
 
    </div>
    





</section>
<?php
}
?>

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


<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</html>
