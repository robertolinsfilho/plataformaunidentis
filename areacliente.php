<?php
include("conexao.php");
session_start();
error_reporting(0);
if (!isset($_SESSION['emailplataforma'])) {
    header('Location: login2');
}
//consultar no banco de dados

$forekey = $_GET['key'];

$result_usuario1 = "SELECT * from contratocartao where forekey = '{$forekey}'";
$resultado_usuario1 = mysqli_query($conexao, $result_usuario1);
$row_usuario1 = mysqli_fetch_assoc($resultado_usuario1);

$result_usuario2 = "SELECT * from dadospessoais where forekey = '{$forekey}' ";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);

$result_usuario3 = "SELECT * from dadospessoais where forekey = '{$forekey}' and ativo= 1";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);

$result_usuario4 = "SELECT * from dadospessoais where forekey = '{$forekey}' ";
$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);

$result_usuario = "SELECT * from dependentes where forekey ='$forekey'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
if (!isset($row_usuario2)) {
    //  header('Location: login2');
}
if (isset($row_usuario3)) {
    header('Location: andamento');
}
//Verificar se encontrou resultado na tabela "usuarios"
$url = "http://unidentis.s4e.com.br/SYS/services/vendedor.aspx/NovoUsuario?token=rHFxpzIE8Ny86TNhgGzoybf93bcIopkXxqKdfShdgUbdpoALw0&id=0&cpf=. '$row_usuario2[cpf]' .&tipo=0";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($curl), true);

if (isset($resultado['mensagem'])) {
    header('Location: login2');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="./assets/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
    <title>Unidentis</title>

    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script type="text/javascript">
        $("#telefone, #celular").mask("(00) 00000-0000");
    </script>
    <script type="text/javascript">
        $("#cartao").mask("0000 0000 0000 0000");
    </script>
    <script type="text/javascript">
        $("#mes").mask("00");
    </script>
    <script type="text/javascript">
        $("#ano").mask("0000");
    </script>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: BizLand - v1.1.0
    * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <link rel="stylesheet" href="./assets/css/areaclienteboleto.css">
    <link rel="stylesheet" href="./assets/creditCard/style.css">
</head>

<body>

    <!-- ======= Top Bar ======= -->
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




    <section id="form2" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="200">
            <h1>Proposta</h1>


            <br>
            <div class='box-areaBoleto' style="background-color:#f6f6f6;padding:10px;border-radius:10px">

                <div class="flexLabel">
                    <label class="labelInput">Titular</label>
                    <hr>
                </div>
                <form id="myForm" action="contratocartao?key=<?= $forekey?>" method="POST">

                    <div class="row">
                        <div class="col-md-4">
                            <label style="font-family:'Poppins', sans-serif;  " for="LabelNome">E-mail</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $row_usuario2['email'] ?>" readonly>
                        </div>

                        <div class="col-md-4">
                            <label style=" font-family:'Poppins', sans-serif;  " for="LabelNome">Cpf</label>
                            <input type="text" cpf class="form-control" name="cpf" value="<?php echo $row_usuario2['cpf'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label style=" font-family:'Poppins', sans-serif;  " for="LabelNome">Plano</label>
                            <input type="text" class="form-control" name="plano" value="<?php echo $row_usuario2['plano'] ?>" readonly>
                        </div>

                        <br>
                    </div>

            </div>
            <br>
            <div class='box-areaBoleto' style="background-color:#f6f6f6;padding:10px;border-radius:10px">
                <div class="flexLabel">
                    <label class="labelInput">Dependentes</label>
                    <hr>
                </div>

                <?php
                $cont2 = 0;
                if ($row_usuario4['cpf_titular'] != $row_usuario4['cpf']) {
                    $cont = '0';
                } else {
                    $cont = '1';
                }

                ?>

                <table class="table">

                    <tbody>
                        <?php

                        while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
                            if ($row_usuario['cpf_titular'] == $row_usuario2['cpf']) {

                        ?>

                                <div class="table-responsive-sm">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <?php
                                                $cont++;
                                                $cont2++;
                                                ?>
                                                <th><label>CPF do Responsável Financeiro</label><input style=" border: 1px solid #606060 !important; " cpf class="form-control" value="<?php echo $row_usuario['cpf_titular']; ?>" readonly></th>
                                                <th><label>Nome</label><input style=" border: 1px solid #606060 !important; " class="form-control" value="<?php echo $row_usuario['nome']; ?>" readonly></th>
                                                <th><label>CPF do Dependente</label><input style=" border: 1px solid #606060 !important; " cpf class="form-control" value="<?php echo $row_usuario['cpf']; ?>" readonly></th>




                                            </tr>
                                        </thead>
                                </div>

                        <?php
                            }
                        } ?>
                    </tbody>
                </table>
                <h4>Numero Dependentes <?php echo $cont2 ?> </h4>

            </div>




            <br>

            <section class="d-flex justify-content-center align-items-start flex-wrap">
                <div class="infoPdf">
                    <div class="flexLabel">
                        <label class="labelInput">Contrato</label>
                        <hr>
                    </div>
                    <a class="linkPdf" link="./pdf/CONTRATO_IND_FAMILIAR.pdf" style="cursor:pointer;"><i class="far fa-file-pdf" style="font-size:30px; padding: .5rem 0;"></i> Clique aqui para baixar a minuta do contrato.</a> <br><br>
                    <a class="linkPdf" link="./pdf/Manual_de_orientacao_para_contratacao_de_planos_de_saude.pdf" style="cursor:pointer;"><i class="far fa-file-pdf" style="font-size:30px; padding: .5rem 0;"></i> Clique aqui para baixar a manual de orientação.</a><br><br>
                    <a class="linkPdf" link="./pdf/GUIA_DE_LEITURA_CONTRATUAL.pdf" style="cursor:pointer;"><i class="far fa-file-pdf" style="font-size:30px; padding: .5rem 0;"></i> Clique aqui para baixar a guia de leitura contratatual.</a><br><br>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="termos" required>
                        <label class="form-check-label" for="inlineCheckbox1">Li e concordo com os termos do contrato</label>
                    </div>
                </div>
                <!-- <iframe src="./pdf/CONTRATO_IND_FAMILIAR.pdf" width="500" height="500"></iframe> -->
                <embed class="pdf_embed" src="./pdf/CONTRATO_IND_FAMILIAR.pdf" />
            </section>

            <!-- cartão de crédito -->
            <div class="flexLabel" id="dataCartao">
                <label class="labelInput">Dados do Cartão</label>
                <hr>
            </div>
            <?php if($_SESSION['cpfDiferente']): ?>
                <div class="alert alert-danger" role="alert">
                    Responsável financeiro precisa ser dono do cartão
                </div>
            <?php endif;?>
            <?php if($_SESSION['cartaoInvalido']): ?>
                <div class="alert alert-danger" role="alert">
                    Cartão informado não é válido 
                </div>
            <?php endif;?>
            
            <!-- Area cartao -->
            <div class="payment_section">
                <div class="container-credit_card preload">
                    <div class="creditcard">
                        <div class="front">
                            <div id="ccsingle"></div>
                            <svg version="1.1" id="cardfront" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                                <g id="Front">
                                    <g id="CardBackground">
                                        <g id="Page-1_1_">
                                            <g id="amex_1_">
                                                <path id="Rectangle-1_1_" class="lightcolor grey" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                        C0,17.9,17.9,0,40,0z" />
                                            </g>
                                        </g>
                                        <path class="darkcolor greydark" d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z" />
                                    </g>
                                    <text transform="matrix(1 0 0 1 60.106 295.0121)" id="svgnumber" class="st2 st3 st4">0123 4567 8910 1112</text>
                                    <text transform="matrix(1 0 0 1 54.1064 428.1723)" id="svgname" class="st2 st5 st6">João P L Nascimento</text>
                                    <text transform="matrix(1 0 0 1 54.1074 389.8793)" class="st7 st5 st8">Dono do Cartão</text>
                                    <text transform="matrix(1 0 0 1 479.7754 388.8793)" class="st7 st5 st8">Expiração</text>
                                    <text transform="matrix(1 0 0 1 65.1054 241.5)" class="st7 st5 st8">Número do Cartão</text>
                                    <g>
                                        <text transform="matrix(1 0 0 1 574.4219 433.8095)" id="svgexpire" class="st2 st5 st9">01/23</text>
                                        <text transform="matrix(1 0 0 1 479.3848 417.0097)" class="st2 st10 st11">VALID</text>
                                        <text transform="matrix(1 0 0 1 479.3848 435.6762)" class="st2 st10 st11">THRU</text>
                                        <polygon class="st2" points="554.5,421 540.4,414.2 540.4,427.9    " />
                                    </g>
                                    <g id="cchip">
                                        <g>
                                            <path class="st2" d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3
                                    c10.2,0,18.5,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z" />
                                        </g>
                                        <g>
                                            <g>
                                                <rect x="82" y="70" class="st12" width="1.5" height="60" />
                                            </g>
                                            <g>
                                                <rect x="167.4" y="70" class="st12" width="1.5" height="60" />
                                            </g>
                                            <g>
                                                <path class="st12" d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3
                                        c0-10.2,8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3
                                        C143.9,122.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5
                                        c-3.1,3.2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5
                                        c3.1-3.2,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z" />
                                            </g>
                                            <g>
                                                <rect x="82.8" y="82.1" class="st12" width="25.8" height="1.5" />
                                            </g>
                                            <g>
                                                <rect x="82.8" y="117.9" class="st12" width="26.1" height="1.5" />
                                            </g>
                                            <g>
                                                <rect x="142.4" y="82.1" class="st12" width="25.8" height="1.5" />
                                            </g>
                                            <g>
                                                <rect x="142" y="117.9" class="st12" width="26.2" height="1.5" />
                                            </g>
                                        </g>
                                    </g>
                                </g>
                                <g id="Back">
                                </g>
                            </svg>
                        </div>
                        <div class="back">
                            <svg version="1.1" id="cardback" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                                <g id="Front">
                                    <line class="st0" x1="35.3" y1="10.4" x2="36.7" y2="11" />
                                </g>
                                <g id="Back">
                                    <g id="Page-1_2_">
                                        <g id="amex_2_">
                                            <path id="Rectangle-1_2_" class="darkcolor greydark" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                    C0,17.9,17.9,0,40,0z" />
                                        </g>
                                    </g>
                                    <rect y="61.6" class="st2" width="750" height="78" />
                                    <g>
                                        <path class="st3" d="M701.1,249.1H48.9c-3.3,0-6-2.7-6-6v-52.5c0-3.3,2.7-6,6-6h652.1c3.3,0,6,2.7,6,6v52.5
                                C707.1,246.4,704.4,249.1,701.1,249.1z" />
                                        <rect x="42.9" y="198.6" class="st4" width="664.1" height="10.5" />
                                        <rect x="42.9" y="224.5" class="st4" width="664.1" height="10.5" />
                                        <path class="st5" d="M701.1,184.6H618h-8h-10v64.5h10h8h83.1c3.3,0,6-2.7,6-6v-52.5C707.1,187.3,704.4,184.6,701.1,184.6z" />
                                    </g>
                                    <text transform="matrix(1 0 0 1 621.999 227.2734)" id="svgsecurity" class="st6 st7">985</text>
                                    <g class="st8">
                                        <text transform="matrix(1 0 0 1 518.083 280.0879)" class="st9 st6 st10">security code</text>
                                    </g>
                                    <rect x="58.1" y="378.6" class="st11" width="375.5" height="13.5" />
                                    <rect x="58.1" y="405.6" class="st11" width="421.7" height="13.5" />
                                    <text transform="matrix(1 0 0 1 59.5073 228.6099)" id="svgnameback" class="st12 st13">John Doe</text>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="form-card-container">
                    <div class="field-card-container">
                        <label for="name">Nome</label>
                        <input id="name_card" name="nomecartao" placeholder="Ex.: João P L Nascimento*" maxlength="20" type="text">
                    </div>
                    <div class="field-card-container">
                        <label for="cpf">CPF</label>
                        <input name="cpfcartao" id="cpf_card" required cpf placeholder="Ex.: 000.000.000-00*" maxlength="14" type="text">
                    </div>
                    <div class="field-card-container">
                        <label for="cardnumber">Número do Cartão</label>
                        <input id="cardnumber" name="cartao" placeholder="Ex.: 0123 4567 8910 1112*" type="text">
                        <svg id="ccicon" class="ccicon" width="750" height="471" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">

                        </svg>
                    </div>
                    <div class="field-card-container">
                        <label for="expirationdate">Data de Expiração</label>
                        <input name="mes" id="expirationdate" type="text" placeholder="Ex.: 01/23*" inputmode="numeric">
                    </div>
                    <div class="field-card-container">
                        <label for="securitycode">CVV</label>
                        <input name="cvv" id="securitycode" type="text" placeholder="Ex.: 123*" pattern="[0-9]*" inputmode="numeric">
                    </div>
                    
                    <!-- <div class="field-card-container">
                        <a id="verify_card" class="btn">Verificar</a>
                    </div> -->
                    <span class="return_message">Cartão Inválido</span>
                    <div id="loader-credit_card"></div>
                </div>
            </div>
            <!-- cartão de crédito-->
            <br>
            <?php
            $preco = $row_usuario2['preco'];
            if ($row_usuario2['plano'] === 'UNIDENTISVIPBOLETO' &&  $row_usuario2['local'] === 'PB') {
                $preco = 40;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' &&  $row_usuario2['local'] === 'PB') {
                switch ($cont) {
                    case '1':
                        $preco = 21.90;
                        break;
                    
                    case '2':
                        $preco = 20.90;
                        break;

                    default:
                        if($cont > 2){
                            $preco = 19.90;                            
                        }
                        break;
                }
            }  elseif ($row_usuario2['plano'] === 'UNIDENTISVIPFAMILIACARTAO' &&  $row_usuario2['local'] === 'PB') {
                
                switch ($cont) {
                    case '1':
                        $preco = 60.00;
                        break;
                    
                    case '2':
                        $preco = 30.00;
                        break;

                    default:
                    if($cont > 2){
                            $preco =  20.00;                            
                        }
                        break;
                }
            }  elseif ($row_usuario2['plano'] === 'UNIDENTISVIPCARTAO' &&  $row_usuario2['local'] === 'PB' && $cont == '1') {
                
                switch ($cont) {
                    case '1':
                        $preco = 23.90;
                        break;
                    default:
                        if($cont > 1){
                            $preco = 22.90;                          
                        }
                        break;
                }
            } 

            if ($row_usuario2['plano'] == 'PLANOVIPORTOCARTAO'){
                $preco = 99.00;
              }

            if ($row_usuario2['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' &&  $row_usuario2['local'] === 'RN') {
                
                switch ($cont) {
                    case '1':
                        $preco = 25.00;
                        break;
                    
                    case '2':
                        $preco = 24.00;
                        break;

                    default:
                        if($cont > 2){
                            $preco = 23.00;                            
                        }
                        break;
                }
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPFAMILIACARTAO' &&  $row_usuario2['local'] === 'RN') {
                
                switch ($cont) {
                    case '1':
                        $preco = 66.00;
                        break;
                    
                    case '2':
                        $preco = 33.00;
                        break;

                    default:
                        if($cont > 2){
                            $preco = 22.00;                            
                        }
                        break;
                }
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPCARTAO' &&  $row_usuario2['local'] === 'RN') {
                $preco = 25.90;
                switch ($cont) {
                    case '1':
                        $preco = 25.90;
                        break;
                    default:
                        if($cont > 1){
                            $preco = 24.90;                          
                        }
                        break;
                }
            }

            $_SESSION['preco'] = $preco;

            if ($cont == '0') {
                $cont = '1';
            }

            $preco2 = $preco * $cont;

            ?>
            <div class="d-flex justify-content-center align-items-end flex-wrap">

                <div id="resumo" class="mr-auto">
                    <h3 style="font-family: 'Poppins', sans-serif;font-size:.9rem; color: #ffffff;">Valor individual R$<?php echo $preco ?></h3>
                    <hr style='background-color: #ffffff;'>
                    <h3 style="font-family: 'Poppins', sans-serif;font-size:.9rem; color: #ffffff;">Beneficiários <?php echo $cont?></h3>
                    <hr style='background-color: #ffffff;'>
                    <h3 style="font-family: 'Poppins', sans-serif;font-size:.9rem; color: #ffffff;">Total R$<?php echo $preco2 ?></h3>
                </div>
                <?php if($_SESSION['cpfDiferente']):?>
                    <button class="btn btn-secondary scrollto">Confirmar Proposta</button>
                    <script>                        
                        let btn = document.querySelector(".btn.btn-secondary.scrollto");
                        btn.style.cursor = 'not-allowed';
                        btn.addEventListener("click", event => {
                            event.preventDefault();
                        })
                    </script>
                <?php else:?>
                    <button id="submit" type="submit" class="btn-get-started scrollto check">Confirmar Proposta</button>
                <?php endif;?>
                    
            </div>
        </div>

        </form>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script>
    $("[nCard]").mask("0000 0000 0000 0000");
    $("[data]").mask("00/00");
    $("[cpf]").mask("000.000.000-00");
</script>

<!-- change link -->
<script src="assets/js/change-link.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.4.0/imask.min.js"></script>
<script src="./assets/creditCard/script.js"></script>

</html>