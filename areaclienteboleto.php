<?php
include("conexao.php");
session_start();

if(empty($_SESSION['emailplataforma'])){
  header('Location: login2');
}



$result_usuario1 = "SELECT * from contratocartao where email = '{$_SESSION['emailplataforma']}'";
$resultado_usuario1 = mysqli_query($conexao, $result_usuario1);
$row_usuario1 = mysqli_fetch_assoc($resultado_usuario1);
if(isset($row_usuario1)){
  //  header('Location: login2');
    $_SESSION['msg'] = 'Plano Já Cadastrado';
}

//Verificar se encontrou resultado na tabela "usuarios"
$result_usuario2 = "SELECT * from dadospessoais where email ='$_SESSION[emailplataforma]'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);

$result_usuario3 = "SELECT * from dadospessoais where email = '{$_SESSION['emailplataforma']}' and ativo= 1";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);

$result_usuario4 = "SELECT * from dadospessoais where email = '{$_SESSION['emailplataforma']}' ";
$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);
if(isset($row_usuario3)){
    header('Location: andamento');
}

$result_usuario = "SELECT * from dependentes where cpf_titular = '$row_usuario2[cpf]' ";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
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
    <style>
        iframe{
            margin-left: 50%;
            position: absolute;
        }
        #form2 .container {
  
            padding-top: 50px !important;
        }
        th,tr{
               width:25%
        }
        #resumo{
        margin-left:0%;
        background-color:#4177d0 ;
        padding:20px;
        width:40%
        
        }
        #submit{
            margin-left:80%
        }
        @media screen and (max-device-width: 480px) {
            iframe{
                visibility: hidden;
            }
            th{
                text-align:center
            }
            #submit{
            margin-left:60%
        }
            #resumo{
        margin-left:0%;
        background-color:#4177d0 ;
        padding:20px;
        width:80%
        
        }
        }
        body{
            background-color: #ededed !important;
        }
        h1, h2,h3,h4,h5,label,a{
            color:#606060
        }
        input, select{
             border: 1px solid #606060 !important; 
        }
        
        </style>
</head>

<body >

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
        <div  style="background-color:#f6f6f6;padding:10px;border-radius:10px">
        <h4>Titular</h4>
        <hr style="width: 90%;position: relative;margin-top: -2.0%;margin-left: 10%;font-weight:bold;height:1px;background-color:#606060;" size = "50">
        <form action="contrato.php" method="POST">
            <div class="row">

                <div class="col-md-4">
                    <label style=" font-family:'Poppins', sans-serif;  " for="LabelNome">E-mail:</label>
                    <input type="text" class="form-control" name="email" value = "<?php echo $row_usuario2['email'] ?>" readonly>
                </div>
                <div class="col-md-4">
                    <label style=" font-family:'Poppins', sans-serif;  " for="LabelNome">Plano</label>
                    <input type="text" class="form-control" name="plano" value = "<?php echo $row_usuario2['plano']  ?>"   readonly>
                </div>
                <div class="col-md-4">
                    <label style=" font-family:'Poppins', sans-serif;  " for="LabelNome">Cpf</label>
                    <input type="text" class="form-control" name="cpf"  value = "<?php echo $row_usuario2['cpf'] ?>" readonly>
                </div>
                <br>
            </div>
            <br>
    </div>
            <?php 


?>
<br>
<div  style="background-color:#f6f6f6;padding:10px;border-radius:10px">
            <h4>Dependentes</h4>
           

            
            <table class="table">
               
                <tbody>
                <?php
                $cont = 0;
                $cont2 = 0 ;
                while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
                   
                        $cont++;
                        $cont2++;
                        ?>

                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th ><label>CPF do Responsável Financeiro</label><input class="form-control"value="<?php echo $row_usuario['cpf_titular']; ?>"readonly></th>
                                    <th ><label>Nome</label><input class="form-control"value="<?php echo $row_usuario['nome']; ?>"readonly></th>
                                    <th ><label>CPF do Dependente</label><input class="form-control"value="<?php echo $row_usuario['cpf']; ?>"readonly></th>
                                  
                                  
                                </tr>
                                </thead>
                        </div>
                        <div class="footer">
                            <p></p>
                        </div>
                        <?php
                    }?>
                </tbody>
            </table>
            <h4>Numero Dependentes: <?php echo $cont2?> </h4>
  
            <?php
            if($row_usuario2['plano'] === 'UNIDENTISVIPBOLETO' && $cont === 0){
                $preco = 40;
            }elseif($row_usuario2['plano'] === 'UNIDENTISVIPBOLETO' && $cont > 0){
                $preco = 35;
            }
            
            elseif($row_usuario2['plano'] === 'UNIDENTISVIPEMPRESARIAL'){
                $preco = 18;
            }
        
            $_SESSION['preco'] = $preco;
           $cont = $cont + 1;
           $preco = $preco * $cont;

            
            ?>



        </div>
            <br>

            <h2>Contrato:</h2>
            <iframe  src="./pdf/CONTRATO_IND_FAMILIAR.pdf"width="500" height="500"></iframe>
            <i class="far fa-file-pdf"  style="font-size:30px"></i> <a href="./pdf/CONTRATO_IND_FAMILIAR.pdf" target="_blank">Clique aqui para baixar a minuta do contrato.</a> <br><br>
            <i class="far fa-file-pdf"  style="font-size:30px"></i> <a href="./pdf/Manual_de_orientacao_para_contratacao_de_planos_de_saude.pdf" target="_blank">Clique aqui para baixar a manual de orientação.</a><br><br>
            <i class="far fa-file-pdf"  style="font-size:30px"></i> <a href="./pdf/GUIA_DE_LEITURA_CONTRATUAL.pdf" target="_blank">Clique aqui para baixar a guia de leitura contratatual.</a><br><br>
           <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="termos" required>
                <label class="form-check-label" for="inlineCheckbox1">Li e concordo com os termos do contrato</label>
            </div><br>
           <?php
            if($row_usuario2['plano'] != 'UNIDENTISVIPEMPRESARIAL'){
            ?>
            <h2>Dia do vencimento:</h2>


            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="5" required>
                <label class="form-check-label" for="inlineRadio1">5</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="10" required>
                <label class="form-check-label" for="inlineRadio2">10</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="15"  required>
                <label class="form-check-label" for="inlineRadio3">15</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="20"  required>
                <label class="form-check-label" for="inlineRadio3">20</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="25"  required>
                <label class="form-check-label" for="inlineRadio3">25</label>
            </div>
            <?php
            }
            ?>
            <br><br><br><br>

            <div  id="resumo">
            <h3 style="font-family: 'Poppins', sans-serif;font-size:20px;color:white">Plano Dental : R$<?php echo $preco?></h3>
            <hr>
            <h3 style="font-family: 'Poppins', sans-serif;font-size:20px;color:white">Dependentes :<?php echo $cont2?></h3>
            <hr>
            <h3 style="font-family: 'Poppins', sans-serif;font-size:20px;color:white">Total: R$<?php echo $preco?></h3>
            
            </div>
            
            <br>


            <button id="submit" type="submit" class="btn-get-started scrollto">Prosseguir</button>
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


<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<?php


?>
</html>
