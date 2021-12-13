<?php
include("conexao.php");
session_start();
$cpf = $_SESSION['cpf'];
$result_usuario = "SELECT * from endereco where cpf ='$cpf'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

$_SESSION['emaildependente'] = $_POST['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Unidentis</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/icon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="shortcut icon" href="./assets/img/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script type="text/javascript">
        $("#telefone, #celular").mask("(00) 00000-0000");
    </script>
    <script type="text/javascript">
        $("#cpf").mask("000.000.000-00");
    </script>
    <script type="text/javascript">
        $("#rg").mask("0.000.000");
    </script>
    <script type="text/javascript">
        $("#data").mask("00/00/0000");
    </script>
    <!-- =======================================================
  * Template Name: BizLand - v1.1.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        #header {
            top: 0;
            padding: 15px;
        }

        #blip-chat-container #blip-chat-open-iframe {
            background-color: red;
            width: 8%;
            max-width: 100px;
            max-height: 100px;
        }

        @media screen and (max-width: 480px),
        screen and (max-height: 420px) {
            #blip-chat-container #blip-chat-open-iframe {
                background-color: red;
                width: 30%;
                max-width: 100px;
                max-height: 100px;
            }
        }

        .flexLabel {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 0.5rem 0;
            margin-top: 0rem;
            margin-left: -.5rem;
        }

        .flexLabel .labelInput {
            font-size: 0.9rem;
            white-space: nowrap;
            padding-right: 1rem;
            font-weight: bold;
            color: #606060;
            text-transform: uppercase;
            font-size: 1.5rem;
            line-height: 1.875rem;
        }

        .flexLabel hr {
            position: relative;
            top: -0.15rem;
            display: block;
            width: 100%;
            height: 1px;
            background-color: #606060;
        }

        label {
            position: relative;
            z-index: 999;
            left: .5rem;
            background-color: #f6f6f6;
        }

        input.form-control {
            background-color: #f6f6f6 !important;
            position: relative;
            top: -1.1rem;
        }

        .alert-primary {
            color: #f6f6f6;
            background-color: #023bbf;
            border-color: #023bbf;
        }
    </style>
    <link rel="stylesheet" href="./assets/css/step-fake.css">
    <link rel="stylesheet" href="./assets/css/isRequired.css">

</head>

<body style="background-color: #eee;">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LOCALIZAÇÃO DAS CLÍNICAS </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-weight: 500 !important;">Fechar</button>

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
                        <span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5> ACESSE COM O NÚMERO DO CPF DO TITULAR DO PLANO E A SENHA INICIAL 1234 </h5>
                    <br>
                </div>
                <div class="modal-footer">
                    <a href="https://unidentis.s4e.com.br/SYS/?TipoUsuario=1"> <button type="button" class="btn btn-secondary" style="font-weight: 500 !important;">Acessar</button></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/blip-chat-widget@1.6.*" type="text/javascript">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <a href="https://unidentis.com.br/" target="_blank"><img style="width: 38%; height: 25%;" src="http://unidentisdigital.com.br/assets/img/LOGO.png" /></a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="https://unidentis.com.br/" target="_blank">Home</a></li>
                    <li><a href="https://unidentis.com.br/redecredenciada" target="_blank">Rede Credenciada</a></li>
                    <li><a href="https://unidentis.com.br/querosercliente" target="_blank">Tornar-se Cliente</a></li>
                    <li><a href="https://unidentis.com.br/carteirinha" target="_blank">Carteira Digital</a></li>
                    <li><a href="https://unidentis.com.br/segundavia" target="_blank">Boleto</a></li>

                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- ======= Top Bar ======= -->


    <section id="form3" class="d-flex align-items-center">
        <div id="centro" class="container" data-aos="zoom-out" data-aos-delay="200">
            <div class="d-flex justify-content-between fake-step">
                <span class="fake-step-one done"><i class="fas fa-check-circle"></i> Dados Pessoais</span>
                <hr>
                <span class="fake-step-two here"><i class="far fa-circle"></i> Endereço</span>
                <hr>
                <span class="fake-step-three"><i class="far fa-circle"></i> Beneficiários</span>
            </div>
            
            <div class="flexLabel">
                <label class="labelInput">Dados do Endereço</label>
                <hr>
            </div>
            <div class="row">

                <div class="col">
                    <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">CEP:</label>
                    <input type="text" name="CEP" class="form-control isRequired" value="<?php echo $_SESSION['cepdependente'] ?>" placeholder="Nome Completo" readonly required>
                </div>
                <div class="col">
                    <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Rua</label>
                    <input type="text" name="nome" class="form-control isRequired" value="<?php echo $_SESSION['ruadependente'] ?>" placeholder="Nome Completo" readonly required>
                </div>
                <div class="col">
                    <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Estado:</label>
                    <input type="text" name="cpf_titular" value="<?php echo $_SESSION['ufdependente'] ?>" class="form-control isRequired" placeholder="Nome Completo" readonly required>
                </div>
            </div>
            <div class="row">

                <div class="col">
                    <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Numero:</label>
                    <input type="text" name="cpf_titular" value="<?php echo $_SESSION['numerodependente'] ?>" class="form-control isRequired" placeholder="Nome Completo" required>
                </div>


                <div class="col">
                    <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">Bairro</label>
                    <input type="text" name="bairro" class="form-control" value="<?php echo $_SESSION['bairrodependente'] ?>" readonly>
                </div>

                <br>
            </div>
            <br>
            <a href="dependentes3?#form"> <button type="submit" isRequired class="btn-get-started scrollto check">prosseguir</button></a>
        </div>
        </div>
    </section>


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
<script src="./assets/js/isRequired.js"></script>

</html>