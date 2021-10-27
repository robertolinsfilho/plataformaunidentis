<?php
include("conexao.php");
session_start();
error_reporting(0);
if (!isset($_SESSION['emailplataforma'])) {
    header('Location: login2');
}
//consultar no banco de dados



$result_usuario1 = "SELECT * from contratocartao where email = '{$_SESSION['emailplataforma']}'";
$resultado_usuario1 = mysqli_query($conexao, $result_usuario1);
$row_usuario1 = mysqli_fetch_assoc($resultado_usuario1);

$result_usuario2 = "SELECT * from dadospessoais where email = '{$_SESSION['emailplataforma']}' ";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);

$result_usuario3 = "SELECT * from dadospessoais where email = '{$_SESSION['emailplataforma']}' and ativo= 1";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);

$result_usuario4 = "SELECT * from dadospessoais where email = '{$_SESSION['emailplataforma']}' ";
$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);

$result_usuario = "SELECT * from dependentes where cpf_titular ='$row_usuario2[cpf]'";
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
    <style>



    </style>
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
                <form action="contratocartao" method="POST">

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
            <div class="creditCard">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12">
                        <div class="bg-light">
                            <p class="heading text-secondary">DETALHES DE PAGAMENTOS</p>
                            <form class="card-details ">
                                <div class="form-group">
                                    <p class="mb-0">Número do Cartão</p>
                                    <input nCard type="text" class="mt-1" name="cartao" placeholder="1234 5678 9012 3457" size="17" id="cartao" minlength="19" maxlength="19">
                                    <!-- <img src="./assets/img/BANDEIRAS.png" alt="bandeiras de cartão" class="card-flag" id="visa"> -->
                                </div>
                                <div class="form-group">
                                    <p class="mb-0">Nome do Cartão</p>
                                    <input type="text" class="mt-1" name="nomecartao" placeholder="(Como esta no Cartão)" required>
                                </div>
                                <div class="form-group">
                                    <p class="mb-0">CPF (titular do plano)</p>
                                    <input type="text" cpf class="mt-1" name="cpfcartao" placeholder="123-456-789-01" required>
                                </div>
                                <div class="form-group pt-2 smallInput">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-sm-4">
                                            <p class="mb-0">Data</p>
                                            <input type="text" class="mt-1" data name="mes" placeholder="MM/YY" size="5" id="data" minlength="5" maxlength="5">

                                        </div>
                                        <div class="col-sm-4">
                                            <p class="mb-0">CVV</p>
                                            <input type="text" class="mt-1" name="cvv" placeholder="000" size="3" minlength="3" maxlength="4">
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- cartão de crédito
         -->
            <br>
            <?php

            $preco = $row_usuario2['preco'];
            if ($row_usuario2['plano'] === 'UNIDENTISVIPBOLETO' &&  $row_usuario2['local'] === 'PB') {
                $preco = 40;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' &&  $row_usuario2['local'] === 'PB' && $cont == '0') {
                $preco = 21.90;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' && $cont == '1' && $row_usuario2['local'] === 'PB') {
                $preco = 20.90;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' &&  $cont > '1' &&  $row_usuario2['local'] === 'PB') {
                $preco = 19.90;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPFAMILIACARTAO' &&  $row_usuario2['local'] === 'PB' &&  $cont == 1) {
                $preco = 60.00;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPFAMILIACARTAO'  &&  $row_usuario2['local'] === 'PB' &&  $cont > 1) {
                $preco =  30.00;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPFAMILIACARTAO' &&  $cont > 3 && $row_usuario2['local'] === 'PB') {
                $preco =  20.00;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPCARTAO' &&  $row_usuario2['local'] === 'PB' && $cont == '0') {
                $preco = 23.90;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPCARTAO' &&  $row_usuario2['local'] === 'PB' && $cont > '1') {
                $preco = 22.90;
            }

            if ($row_usuario2['plano'] == 'PLANOVIPORTOCARTAO'){
                $preco = 99.00;
              }

            if ($row_usuario2['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' &&  $row_usuario2['local'] === 'RN') {
                $preco = 25.00;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' &&  $row_usuario2['local'] === 'RN' &&  $cont >= 1) {
                $preco = 24.00;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' &&  $row_usuario2['local'] === 'RN' &&  $cont > 2) {
                $preco = 23.00;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPFAMILIACARTAO' &&  $row_usuario2['local'] === 'RN') {
                $preco = 66.00;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPFAMILIACARTAO' && $row_usuario2['local'] === 'RN' &&  $cont >= 2) {
                $preco = 33.00;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPFAMILIACARTAO' &&  $row_usuario2['local'] === 'RN' &&  $cont >= 3) {
                $preco = 22.00;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPCARTAO' &&  $row_usuario2['local'] === 'RN') {
                $preco = 25.90;
            } elseif ($row_usuario2['plano'] === 'UNIDENTISVIPCARTAO' &&  $row_usuario2['local'] === 'RN' && $cont >= 1) {
                $preco = 24.90;
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
                    <h3 style="font-family: 'Poppins', sans-serif;font-size:.9rem; color: #ffffff;">Beneficiários <?php echo $cont2 + 1 ?></h3>
                    <hr style='background-color: #ffffff;'>
                    <h3 style="font-family: 'Poppins', sans-serif;font-size:.9rem; color: #ffffff;">Total R$<?php echo $preco2 ?></h3>
                </div>
                <button id="submit" type="submit" class="btn-get-started scrollto">Confirmar Proposta</button>
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

</html>