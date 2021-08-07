<?php
session_start();
error_reporting(0);
include_once 'conexao.php';
$codigo = $_POST['codigo'];
$x = 0;

if(!empty($_POST['codigo'])){
    
$result_usuario = "SELECT * FROM dependentes where cpf_titular = '$_SESSION[cpf]'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
 if($row_usuario['senha'] == $codigo){
        $x = 1;       
 }
}



if($x == 1){
    $_SESSION['sms'] = 'Código Correto , Dependente enviado para análise!';
    header('Location: confirmacao');
}

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
            <div class="modal-body">
            <img style="margin-left:%" src=  "http://unidentisdigital.com.br/assets/img/LOGO.png" style="margin-top:-6%;margin-left:0%"alt="" width="220" height="120">
                <h3>Por favor, digite o código que foi enviado para <?php echo $_SESSION['emaildependente'] ?></h3>
                <form method="post"  action="confirmarcodigo">
               <?php if($x != 1 && isset($_POST['codigo'])) {?>
               
                <div class="alert alert-warning" role="alert">
                Código incorreto tente novamente!!!
                </div>
                <?php }?>
                <br>
                
                <input type="text" placeholder="Código" name="codigo" class="form-control" >
               
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" >Enviar</button>

            </div>
            </form>
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
      

      
     <style> 
     #azul{
      background-color: white;
     
     
   
   }
   #input{
       background-color: #023bbf;
       margin-left: -16%;
       height: 230px;
       width: 500px;
       border-radius: 10px;
       padding-top: 20%;
       padding-left: 10%;
       padding-right: 10%;
       border: solid 2px #cccc;
   }
   #borda{
       background-color: white;
       width: 500px;
       height: 78px;
       border: solid 2px #cccc;
       
       border-radius: 10px;
       margin-left: -4.45%;
       margin-top: -2%;
       position:absolute
       
   }
   #titulo{
       background-color: #cccc;
       
       height: 180px;
       width: 357%;
       margin-left: -128%;
       border-radius: 5px;
       

   }

   </style>
<body class="text-center">

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