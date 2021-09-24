<?php 
include_once('conexao.php');
session_start();

$cpf = $_GET['cpf'];
$id = $_GET['id'];
$url = "http://unidentis.s4e.com.br/v2/api/associados?token=RWNTF7PUC87KRYRTVNFGP8XNYWJ4DQC4XWCGSHPW2F9FCURP82&cpfAssociado=$cpf";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($curl),true);
$resultado = $resultado['dados'];
$x =0;

foreach($resultado as $value){
   
    foreach($value['dependentes'] as $value1){
       
        foreach( (array)$value1['nomeSituacao'] as $value2){
          
           
           if($value2 != 'CANCELADO'){
           $x = 1;
           $_SESSION['ufdependente'] = $value['ufSigla'];
           $_SESSION['nomeplano'] = $value1['nomePlano'];
           $codigo = $value['codigo'];
           
           }
        }
      
    }
  
}



$result_usuario = "SELECT * from dadospessoais where cpf = '$cpf'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

$result_usuario4 = "SELECT * from contrato where cpf = '$cpf'";
$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);

$result_usuario5 = "SELECT * from contratocartao where cpf = '$cpf'";
$resultado_usuario5 = mysqli_query($conexao, $result_usuario5);
$row_usuario5 = mysqli_fetch_assoc($resultado_usuario5);

$result_usuario7 = "SELECT * from dependentes where cpf_titular = '$cpf' and status != 'Implantado' and ativo = '1'";
$resultado_usuario7 = mysqli_query($conexao, $result_usuario7);


if($row_usuario4['cpf'] === $cpf){
    $result_usuario10 = "SELECT * from contrato where cpf = '$cpf'";
    $resultado_usuario10 = mysqli_query($conexao, $result_usuario10);
    $row_usuario10 = mysqli_fetch_assoc($resultado_usuario10);
}else{
    $result_usuario10 = "SELECT * from contratocartao where cpf = '$cpf'";
    $resultado_usuario10 = mysqli_query($conexao, $result_usuario10);
    $row_usuario10 = mysqli_fetch_assoc($resultado_usuario10);
}
$result_usuario6 = "SELECT * from dependentes where cpf_titular = '$cpf' and status != 'Implantado' and ativo = '1'";
$resultado_usuario6 = mysqli_query($conexao, $result_usuario6);
$row_usuario6 = mysqli_fetch_assoc($resultado_usuario6);

if($_SESSION['nomeplano'] === 'UNIDENTIS VIP' &&  $_SESSION['ufdependente'] === 'PB'){
    $preco = 35;
}elseif($_SESSION['nomeplano'] === 'UNIDENTIS VIP UNIVERSITARIO CARTAO' &&  $_SESSION['ufdependente'] === 'PB'){
    $preco = 20.90;
}elseif($_SESSION['nomeplano'] === 'UNIDENTIS VIP UNIVERSITARIO CARTAO' &&  $cont >= '1' &&  $_SESSION['ufdependente'] === 'PB'){
    $preco = 19.90;
}elseif ($_SESSION['nomeplano'] === 'UNIDENTIS VIP FAMILIA CARTAO'  && $_SESSION['ufdependente'] === 'PB'){
    $preco =  19.00;
}elseif($_SESSION['nomeplano'] === 'UNIDENTIS VIP CARTAO' &&  $_SESSION['ufdependente']=== 'PB'){
    $preco = 20.00;
}


if($_SESSION['nomeplano'] === 'UNIDENTIS VIP UNIVERSITARIO CARTAO' &&  $_SESSION['ufdependente'] === 'RN'){
    $preco= 21.00;
}elseif ($_SESSION['nomeplano'] === 'UNIDENTIS VIP UNIVERSITARIO CARTAO' &&  $_SESSION['ufdependente'] === 'RN' &&  $cont >= 1){
    $preco = 20.00;
}elseif ($_SESSION['nomeplano'] === 'UNIDENTIS VIP FAMILIA CARTAO' &&  $_SESSION['ufdependente'] === 'RN'    ){
    $preco = 20.00;
}elseif($_SESSION['nomeplano'] === 'UNIDENTIS VIP CARTAO' &&  $_SESSION['ufdependente'] === 'RN'){
    $preco = 22.00;
}

if($_SESSION['nomeplano'] === 'UNIDENTIS VIP' and $_SESSION['ufdependente'] === 'PB'){
    $plano = 13032;   
}elseif ($_SESSION['nomeplano']=== 'UNIDENTIS VIP CARTAO' and $_SESSION['ufdependente'] === 'PB'){
    $plano = 13046;   
}elseif ($_SESSION['nomeplano'] === 'UNIDENTIS VIP FAMILIA CARTAO' and $_SESSION['ufdependente']=== 'PB'){
    $plano = 13050;   
}elseif($_SESSION['nomeplano'] === 'UNIDENTIS VIP UNIVERSITARIO CARTAO' and $_SESSION['ufdependente'] === 'PB') {
    $plano = 13051;   
}elseif($_SESSION['ufdependente'] === 'RN' and $_SESSION['nomeplano'] === 'UNIDENTIS VIP'){
    $plano = 13058;

}elseif ($_SESSION['ufdependente'] === 'RN' and $_SESSION['nomeplano']=== 'UNIDENTIS VIP CARTAO'){
    $plano = 13053;
}elseif ($_SESSION['ufdependente'] === 'RN' and $_SESSION['nomeplano'] === 'UNIDENTIS VIP FAMILIA CARTAO'){
    $plano = 13055;
}elseif ($_SESSION['ufdependente']=== 'RN' and $_SESSION['nomeplano'] === 'UNIDENTIS VIP UNIVERSITARIO CARTAO'){
    $plano = 13056;
}else{
    echo 'erro no plano';
 

}
$result_usuario11 = "SELECT * from vendedor where email = '$row_usuario6[vendedor]'";
$resultado_usuario11 = mysqli_query($conexao, $result_usuario11);
$row_usuario11 = mysqli_fetch_assoc($resultado_usuario11);
$vendedor = substr($row_usuario11['vendedor'] , 0 ,5);
echo $vendedor;
while($row_usuario7 = mysqli_fetch_assoc($resultado_usuario7)){
    


    $data1 =   array(
        "token"=> "rHFxpzIE8Ny86TNhgGzoybf93bcIopkXxqKdfShdgUbdpoALw0",
        "dados"=> array(
                "incluirMensalidades"=> "1",
                "parceiro"=> array(
                "codigo"=>  $vendedor
                ),
            "responsavelFinanceiro"=> array(
               "codigo"=> $codigo
            ),
            "dependente"=>[
                array(
                    "tipo"=> $row_usuario7['parentesco'],
                    "nome"=> "$row_usuario7[nome]",
                    "dataNascimento"=> "$row_usuario7[datas]",
                    "cpf"=> "$row_usuario7[cpf]",
                    "sexo"=> $row_usuario7['sexo'],
                    "plano"=> $plano,
                    "planoValor"=> "$preco",
                    "nomeMae"=> "$row_usuario7[mae]",
                    "numeroProposta"=> "1",
                    "cns" => "$row_usuario7[cns]"
                )
            ],
            "contatoDependente"=> [
                    
                ]
    
        )
    );
    
    
    
    
    
    $payload1 = json_encode($data1);
    
    // Prepare new cURL resource
    $ch1= curl_init('http://unidentis.s4e.com.br/SYS/services/vendedor.aspx/NovoDependente');
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch1, CURLOPT_POST, true);
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $payload1);
    
    // Set HTTP Header for POST request
    curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload1))
    );
    
    // Submit the POST request
    $result1 = curl_exec($ch1);
  
    $result1 = utf8_encode($result1);
    $result1= json_decode($result1, true);
    
    
    curl_close($ch1);
    
    } 
    
    if ($result1['codigo'] == '1') {
      
        $sql2 = "UPDATE dependentes SET status='Implantado', ativo = '0' WHERE cpf_titular='$cpf'";
       if( $conexao->query($sql2) === TRUE){
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
            <img style="margin-left:0%" src=  "http://unidentisdigital.com.br/assets/img/LOGO.png" style="margin-left:0%"alt="" width="220" height="120">
            <br>
                <h2>Dependente Incluído Com Sucesso</h2>
            </div>
            <div class="modal-footer">
               <a href="dependentes"> <button type="button" class="btn btn-secondary" >Fechar</button></a>

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
    $(document).ready(function(){
        $('#myModal').modal('show');
    });
</script>
</body>
</html>

<?php

          
       }
    }else{
        echo 'erro contate o administrador';
    }
?>