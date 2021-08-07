<?php
include_once('conexao.php');
session_start();
error_reporting(0);


if(isset($_SESSION['sms'])){
    ?>
    <html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#myModal').modal('show');
        });
    </script>
    <style>
   
    </style>
</head>


<body class="text-center">
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Unidentis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo $_SESSION['sms'] ?>
            </div>
            <div class="modal-footer">
                <a href="login2" type="button" class="btn btn-secondary" >Fechar</a>

            </div>
        </div>
    </div>
</div>

</body>


</html>
    <?php
    unset($_SESSION['sms']);
}
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- =======================================================
        * Template Name: BizLand - v1.1.0
        * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->

    </head>
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
<style>


    #input{
        background-color: white;
        margin-left: -16%;
        height: 400px;
        width: 500px;
        border-radius: 30px;
        padding-top: 40%;
        padding-left: 10%;
        padding-right: 10%;
        border: solid 2px white;
    }
    #borda{
        background-color: white;
        width: 500px;
        height: 78px;
        border: solid 2px white;
        border-radius: 30px;
        margin-left: -4.45%;
        margin-top: -5%;
        position:absolute
        
    }
    #titulo{
        background-color: white;
        height: 100px;
        width: 360%;
        margin-left: -131%;
        border-radius: 5px;
        margin-top:-2%
    }
    h1{
        margin-left: -75%;
        padding-top:2%;
    }
    img{
       margin-left:-21%;
       margin-top:-15%;
       position:absolute; 
    }
    label{
        color: #cccc; 
        margin-left:-88%;
    }
    button{
        margin-left:60%;margin-top:3%; width:30%;
    }
    #div{
        width:30%;
    }
    body{
        background-image: url("./assets/img/fundocliente1.png");
      
    }
    #butao{
       margin-left:-1%;
       
       position: absolute;
   }
    @media(max-width: 574px){
        #titulo{
        background-color: white;
        width:300px;
        margin-left:-125%;
        margin-top:-10%
    }
    h1{
        margin-left:1%;
        padding-top: 30px;
        font-size:30px;
    }
    img{
        margin-left:-50%;
        width: 50%;
        margin-top:-35%;
        position:absolute;
    }
    #input{
        background-color: white;
        margin-left:-125%;
        height: 320px;
        width:300px;
        border-radius: 10px;
        padding-top: 100%;
    }
   #butao{
       margin-left:-5%;
       margin-top: 10%;
       position: absolute;
   }
    #div{
        background: url("../img/BANNERPRINCIPAL16.png");
    }
    }

    </style>
    <br><br>

<body class="text-center">
<div class="container" id="div">
    <form action="valida2.php" method="POST" class="form-signin">
     <div id="titulo">
     <h1 style="font-weight:bold"> Area do <span style="color: #023bbf;font-weight:bold">Cliente</span></h2>
    
     </div>
     <br>
     
     <div id="back">
        <div id="azul">
            
            <div id="input">
            <img src="http://unidentisdigital.com.br/assets/img/LOGO.png" style="" width="265" >
             <label style="font-weight:bold">E-MAIL</label>   
          <input style="border-radius:5px"type="text" name="usuario"  placeholder="E-mail" class="form-control">
          <br>
          <label style="font-weight:bold">SENHA</label>  
          <input   style="border-radius:5px;" type="password" name="senha" placeholder="Senha" class="form-control">
          <a id="butao"style="margin-top:2%;" href="renamesenha">Esqueci minha senha</a> 
      <button  style="background-color:#023bbf"type="submit" class="btn btn-primary">Entrar</button>
        </div>
    
    
         
      </div>
     <div id="space"></div>
    </form>
</div>
</div>
</body>


<!-- Modal -->



<script src="assets/js/main.js"></script>

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
    $(document).ready(function(){
        $('#myModal').modal('show');
    });
</script>
</body>
</html>