<?php
session_start();
include_once("conexao.php");


$preco = $_SESSION['preco'];
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));

$nomecartao = mysqli_real_escape_string($conexao, trim($_POST['nomecartao']));
$cartao = mysqli_real_escape_string($conexao, trim($_POST['cartao']));
$mes = mysqli_real_escape_string($conexao, trim($_POST['mes']));

$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);
$cartao = str_replace(" ", "", $cartao);



function luhnCheck($cartao)
{
    $str = '';
    foreach (array_reverse(str_split($cartao)) as $i => $c) $str .= ($i % 2 ? $c * 2 : $c);
    return array_sum(str_split($str)) % 10 == 0;
}
if (luhnCheck($cartao) != TRUE) {
    echo 'cartao invalido';
?>
    <?php
    $_SESSION['msg'] = 'Cadastre uma Nova Senha!';
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
            <link href="./assets/css/style.css" rel="stylesheet">

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
                            <span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>Número De Cartão Inválido</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="titularcartao"><button type="button" class="btn btn-secondary" style="font-weight: 500 !important;">Fechar</button></a>

                    </div>
                </div>
            </div>
        </div>






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
            $(document).ready(function() {
                $('#myModal').modal('show');
            });
        </script>
    </body>

    </html>
<?php
    exit();
}





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
    $characters = $capitalLetters . $smallLetters . $numbers . $specialCharacters;

    //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
    $password = substr(str_shuffle($characters), 0, $qtyCaraceters);

    //Retorna a senha
    return $password;
}

$_SESSION['senhaemail'] = generatePassword(5);
if ($_SESSION['vendedor1'] === '') {
    $_SESSION['vendedor1'] = 'site';
}


$sql = "INSERT INTO  contratocartao (cpf,nome,email,nomecartao,cartao,mes,preco) 
VALUES ('$cpf','$nome','$email','$nomecartao','$cartao','$mes','$preco')";

$sql2 = "UPDATE dadospessoais SET etapa = '6' , status ='Pag Pendente', ativo = '1' where cpf = $cpf";
$sql3 = "UPDATE dadosprincipais SET nome = $nome , email = $email where cpf = $cpf";
$sql4 = "INSERT INTO  usuario (usuario, senha) VALUES ('$email', '$_SESSION[senhaemail]')";
if ($conexao->query($sql) === TRUE && $conexao->query($sql4) === TRUE && $conexao->query($sql2)) {
    $_SESSION['status_cadastro'] = true;
    header('Location: http://unidentis.com.br');
} else {
    echo 'erro';
}




?>