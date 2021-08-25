<?php session_start(); ?>
<!DOCTYPE html>
<html>
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
                font-family: Poppins;
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
                font-family: poppins;
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

    <body>
        <div class="text-center" id="div">
            <form method="POST" action="valida.php">
                <div class="barraTopo">
                    <span>Área do Corretor</span>
                </div>

                <div class="campoCentral">
                    <img src="http://unidentisdigital.com.br/assets/img/LOGO.png" width="300">

                    <div class="divEmail">
                        <label>e-mail</label>
                        <input
                            type="text"
                            name="usuario"
                            class="form-control"
                        >
                    </div>

                    <div class="divPassword">
                        <label class="password">senha</label>  
                        <input
                            type="password"
                            name="senha"
                            class="form-control"
                        >
                    </div>

                    <div class="divEsqueciSenhaeEntrar">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </div>
            </form>

        </div>

        <?php include('include/script.php'); ?>
    </body>
</html>