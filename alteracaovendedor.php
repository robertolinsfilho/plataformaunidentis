<?php

include_once('conexao.php');

session_start();
error_reporting(0);


$num = $_GET['num'];
$corretora = $_POST['corretora'];
$email = $_POST['email'];
$responsavel = $_POST['responsavel'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$vendedor = $_POST['vendedor'];
$result_usuario = "SELECT * FROM vendedor WHERE email = $email";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
if (isset($row_usuario['email']) && $num == 2) {
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
                        <h4>Vendedor já Cadastrado</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="cadastrocorretora"> <button type="button" class="btn btn-secondary">Fechar</button></a>

                    </div>
                </div>
            </div>
        </div>


        <body class="text-center">

        </body>


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
            $(document).ready(function() {
                $('#myModal').modal('show');
            });
        </script>
    </body>

    </html>

<?php
}

if ($num == 1) {

    $sql = "UPDATE vendedor set corretora = '$corretora' , vendedor = '$vendedor', cpf = '$cpf', email= '$email'  where email= '$email'";
} elseif ($num == 2) {
    $sql = "INSERT INTO vendedor (corretora, vendedor,cpf,email ) VALUES ('$corretora','$vendedor','$cpf','$email')";
    echo 'entrou';
}

if ($conexao->query($sql) === TRUE) {
    header('Location: vendedores');
} else {
    echo $conexao->$sql->Log::error('message');
}

?>