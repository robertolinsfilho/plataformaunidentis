<?php
$_SESSION['msg'] = 'Cadastre uma Nova Senha!';
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <?php include('include/head.php'); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
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
        <style>
.modal-header, .btn{
    background-color:#023bbf
}
.modal-title, .close{
color:white;
font-family:Poppins;
}
h2{
    font-family:Poppins;
}
</style>
<style>


    #input{
        display: inline-block;
        background-color: white;
        border-radius: 30px;
        border: solid 2px white;
        padding: 2rem;
        max-width: 28rem;
        width: 100%;
    }
    #borda{
        background-color: white;
        border: solid 2px white;
        border-radius: 30px;
        position:absolute
        
    }
    #titulo{
        margin-top: -3.5rem;
        background-color: white;
        width: 100vw;
        height: 100px;
        border-radius: 5px;
        padding-top: 1.5rem;
        padding-left: 5%;
    }
    h1{
        text-align: left;
    }
    img{
        display: block;
        max-width: 280px;
        width: 80%; 
        margin: 0 auto;
    }
    label{
        display: block;
        text-align: left;
        color: #cccc; 
    }
    button{
        display: block;
        width: 30%;
    }

    button.close{
        width: 4rem;
    }

    body{
        background-image: url("./assets/img/fundocliente1.png");
      
    }
    #butao{
       color:#BEBEBE;
       position: absolute;
   }
   #butao:hover{
       
       color:blue;
      
   }
   @media(max-width: 360px){
        #titulo{
            height: 80px;
        }
        h1{
            font-size: 2rem;
        }

        button{
            width: 100%;
        }
    }

    </style>
    </head>

    <br><br><br><br>
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
            <div class="modal-body">Insira seu E-mail</div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Fechar</button>
            </div>
        </div>
    </div>
</div>

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
   
<body lass="text-center">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
<div id="titulo">
    <h1 style="color: #BEBEBE;font-family:poppins;"> Área do <span style="color: #BEBEBE;font-family:poppins;">Cliente</span></h2>
</div>
<br>
<div class="container" id="div">
    <form action="processa2.php" method="POST" class="form-signin">
     <div id="back">
        <div id="azul">
            <div id="input">
            <img src="http://unidentisdigital.com.br/assets/img/LOGO.png" >
            <label style="color: #BEBEBE;font-family:poppins;">E-MAIL</label>   
            <input style="border-radius:5px"type="text" name="email"   class="form-control">
            <br>
            <button  style="background-color:#023bbf" type="submit" class="btn btn-primary">Entrar</button>
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