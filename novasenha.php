<?php
$_SESSION['msg'] = 'Cadastre uma Nova Senha!';
session_start();
error_reporting(0);

$_SESSION['emailsenha'] = $_GET['email'];

?>
<html lang="pt-br">
<head>
        <?php include('include/head.php'); ?>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
        <style>
        body{
            background-image: url(./assets/img/fundocliente1.png);
        }
        .modal-header, .btn{
            background-color:#023bbf
        }
        .modal-title, .close{
            color:white;
            font-family:Poppins;
        }
        .modal-header .close{
            text-align: right;
            font-size: 2em
        }

        .barraTopo {
            background-color: #FFF;
            color: #BEBEBE;
            font-family: Poppins;
            padding: 1.2rem;
            font-size: 32px;
            text-align: initial;
            text-transform: uppercase;
        } 

        img{
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
            font-weight: bolder;
            font-family: poppins;
            text-transform: uppercase;
            color: #BEBEBE;
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

        button#btn {
            margin: 0 auto;
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
        <link rel="stylesheet" href="./assets/css/style.css">
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
               <h4 style="font-size: 1.15rem;">DIGITE A NOVA SENHA</h4>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary" >Fechar</button>

            </div>
        </div>
    </div>
</div>
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

<div class="container" style='margin: 0; padding: 0; max-width: 100%;'>
    <form action="updatenovasenha" method="POST" class="form-signin">
        <div class="barraTopo"> 
            <span>Redefinir Senha</span>
        </div>     
        <div class="campoCentral">
                <img src="http://unidentisdigital.com.br/assets/img/LOGO.png" width="240" >
                <div class='divPassword'>
                    <label>SENHA</label>  
                    <input type="password" name="senha"  class="form-control">
                </div>
                <div class="divEsqueciSenhaeEntrar">
                    <button id="btn" type="submit" class="btn btn-primary">Atualizar</button>
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