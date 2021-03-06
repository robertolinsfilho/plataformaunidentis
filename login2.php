<?php
include_once('conexao.php');
session_start();
error_reporting(0);


if(isset($_SESSION['sms'])){ ?>
<html>
    <head>
        <?php include('include/head.php'); ?>
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
                            <span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <?php echo $_SESSION['sms'] ?>
                    </div>
                    <div class="modal-footer">
                        <a href="login2" type="button" class="btn btn-secondary" style="font-weight: 500 !important;">Fechar</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
    <?php unset($_SESSION['sms']); } ?>
<!-- endIf -->

<html lang="pt-br">
    <head>
        <?php include('include/head.php'); ?>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
        <style>
            body {
                background-image: url("./assets/img/fundousuario.png");
            }

            .barraTopo {
                background-color: #FFF;
                color: #BEBEBE;
                font-family: 'Poppins', sans-serif;
                font-size: 32px;
                padding: 1.2rem;
                text-align: initial;
                text-transform: uppercase;
            }
            
            img {
                margin-top: 2rem;
                margin-bottom: 2rem;
            }

            span {
                margin-left: 2rem;
            }

            input, .divPassword {
                width: 22rem;
                text-align: initial;
            }

            input, .divEmail{
                width: 22rem;
                text-align: initial;
            }

            label {
                color: #BEBEBE;
                font-family: 'Poppins', sans-serif;
                text-transform: uppercase;
            }

            input {
                border-radius: 5px;
            }

            a {
                margin-top: 2rem;
            }

            button {
                background-color: #023bbf;
                text-transform: uppercase;
            }

            .campoCentral {
                max-width: 470px;
                margin: 0 auto;
                padding: 0.5rem 2rem;
                display: flex;
                margin-top: 4rem;
                border-radius: 2rem;
                flex-direction: column;
                background-color: #FFF;
            }

            .campoCentral {
                display: flex;
                align-items: center;
            }

            .divPassword {
                margin-top: 0.5rem;
            }

            .divEsqueciSenhaeEntrar {
                margin-top: 1.0rem;
            }

            button {
                margin-left: 4rem;
                margin-bottom: 0.5rem;
            }

            @media screen and (max-width: 720px) {
                .barraTopo {
                    font-size: 25px;
                }
                
                .campoCentral{
                    max-width: 300px !important;
                }
                
                input, .divPassword {
                    width: 14rem !important;
                    text-align: initial;
                }

                input, .divEmail{
                    width: 14rem !important;
                    text-align: initial;
                }

                .divEsqueciSenhaeEntrar {
                    margin-top: 1rem !important;
                }

                button {
                    margin-left: 0 !important ;
                    margin-top: 1rem;
                    margin-bottom: 1rem;
                }
            }

    </style>

    </head>
    <!-- <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
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
</div> -->  
<body class="text-center">
<div class="container" style='margin: 0; padding: 0; max-width: 100%;'>
    <form action="valida2.php" method="POST" class="form-signin"> 
        <div class="barraTopo">
            <span>??rea do Cliente</span>
        </div>
        <div class="campoCentral">
                <img src="http://unidentisdigital.com.br/assets/img/LOGO.png" width='240'>
                <div class="divEmail">
                    <label>E-MAIL</label>   
                    <input type="text" name="usuario"   class="form-control">
                </div>

                <div class="divPassword">
                    <label>SENHA</label>  
                    <input type="password" name="senha"  class="form-control">
                </div>
                
                <div class="divEsqueciSenhaeEntrar">
                    <a id="butao" href="renamesenha">Esqueci minha senha</a> 
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
        </div>
    </form>
</div>
</body>


<!-- Modal -->
<?php include('include/script.php'); ?>

<script>
    $(document).ready(function(){
        $('#myModal').modal('show');
    });
</script>
</body>
</html>