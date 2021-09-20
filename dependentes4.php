<?php 
include "conexao.php";
session_start();
function generatePassword($qtyCaraceters = 8)
{
    //Letras minúsculas embaralhadas
    $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
 
    //Letras maiúsculas embaralhadas
    $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
 
    //Números aleatórios
    $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
    $numbers .= 1234567890;
 
    //Caracteres Especiais
    $specialCharacters = str_shuffle('!@#$%*-');
 
    //Junta tudo
    $characters = $numbers.$numbers.$numbers.$numbers;
 
    //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
    $password = substr(str_shuffle($characters), 0, $qtyCaraceters);
 
    //Retorna a senha
    return $password;
}
$_SESSION['senhadependente'] = generatePassword(5);

$cpf =$_POST['cpf'];

$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);
$nome =$_POST['nome'];
$parentesco =$_POST['parentesco'];
$sexo =$_POST['sexo'];
$cpf_titular =$_POST['cpf_titular'];
$cns =$_POST['cns'];
$estadocivil =$_POST['estadocivil'];
$datas =$_POST['datas'];
$mae =$_POST['mae'];
if(empty($_SESSION['vendedor1'])){
    $_SESSION['vendedor1'] = 'sac2@unidentis.com.br';

}
$data_atual = date("Y");
$data = substr($datas, 6);
$data1 = $data_atual - $data;
echo $data1;
echo $cpf;

 if($data1 > 17 && empty($_POST['cpf'])){

?>
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
            <img style="margin: 0 auto;" src=  "http://unidentisdigital.com.br/assets/img/LOGO.png" alt="" width="300">
            <br>
                <h5>Maior de 18 anos é obrigatorio CPF </h5>
            </div>
            <div class="modal-footer">
               <a href="dependentes3"> <button type="button" class="btn btn-secondary" >Fechar</button></a>

            </div>
        </div>
    </div>
</div>

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
<?php
exit();
 }


$sql = "INSERT INTO dependentes (nome, cpf, sexo, estadocivil, datas, mae, cpf_titular, cns,parentesco,ativo,vendedor,vizu,senha) 
VALUES ('$nome', '$cpf','$sexo', '$estadocivil','$datas','$mae','$cpf_titular','$cns','$parentesco','1','$_SESSION[vendedor1]', '0','$_SESSION[senhadependente]')";

if($conexao->query($sql) ===TRUE){
    header('Location: dependentes3');

}else{
   $conexao->$sql1->Log::error('message');
   echo "entrou";
}
?>