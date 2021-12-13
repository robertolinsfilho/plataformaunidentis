<?php 
include_once('conexao.php');
session_start();


$cpf = $_GET['key'];
$id = $_GET['id'];

// $result_usuario = "SELECT * from dadospessoais where forekey ='$cpf'";
// $resultado_usuario = mysqli_query($conexao, $result_usuario);
// $row_usuario = mysqli_fetch_assoc($resultado_usuario);

$queryDadosDependentes = mysqli_query($conexao, "SELECT * from dependentes where forekey ='$cpf'");
$dadosDependentes = mysqli_fetch_assoc($queryDadosDependentes);

$result_usuario7 = "SELECT * from dependentes where forekey ='$cpf' and status != 'Implantado' and ativo = '1'";
$resultado_usuario7 = mysqli_query($conexao, $result_usuario7);


/* GET CPF FROM DATABASE */
$uCpf = str_replace('-','',str_replace('.','',$dadosDependentes['cpf_titular']));

$url = "http://unidentis.s4e.com.br/v2/api/associados?token=RWNTF7PUC87KRYRTVNFGP8XNYWJ4DQC4XWCGSHPW2F9FCURP82&cpfAssociado=$uCpf";
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
           $_SESSION['valorplano'] = (float)str_replace(',', '.', explode(' ',$value1['valorPlano'])[1]);
           $_SESSION['nomeplano'] = str_replace(' ', '',$value1['nomePlano']);
           $codigo = $value['codigo'];
    
           }
        }
      
    } 
}

if($codigo == ''){
    echo "<body onload='window.history.back();'>";
    exit;
}

switch ($_SESSION['nomeplano']) {
    case 'PLANOVIPORTOCARTAO':
      $preco = 99;
      break;
    case 'UNIDENTISVIPORTO':
      $preco = 99;
      break;
    case 'UNIDENTISVIPCARTAO':
      switch ($_SESSION['valorplano']) {
        case '23.9':
          $preco = 22.9;
          $infoLocal = 'PB';
          break;
        case '25.9':
          $preco = 24.9;
          $infoLocal = 'RN';
          break;
      }
      break;
    case 'UNIDENTISVIPFAMILIACARTAO':
      switch ($_SESSION['valorplano']) {
        case '60':
          $preco = 30;
          $infoLocal = 'PB';
          break;
        case '30':
          $preco = 20;
          $infoLocal = 'PB';
          break;
        case '66':
          $preco = 33;
          $infoLocal = 'RN';
          break;
        case '33':
          $preco = 22;
          $infoLocal = 'RN';
          break;
      }
      break;
    case 'UNIDENTISVIPUNIVERSITARIOCARTAO':
        switch ($_SESSION['valorplano']) {
            case '21.90':
                $preco = 20.90;
                $infoLocal = 'PB';
                break;
            case '20.90':
                $preco = 19.90;
                $infoLocal = 'PB';
                break;
            case '25':
                $preco = 24;
                $infoLocal = 'RN';
                break;
            case '24':
                $preco = 23;
                $infoLocal = 'RN';
                break;
            }
      break;
    case 'UNIDENTISVIPUNIVERSITARIO':
        switch ($_SESSION['valorplano']) {
            case '21.90':
              $preco = 20.90;
              $infoLocal = 'PB';
              break;
            case '20.90':
              $preco = 19.90;
              $infoLocal = 'PB';
              break;
            case '25':
              $preco = 24;
              $infoLocal = 'RN';
              break;
            case '24':
              $preco = 23;
              $infoLocal = 'RN';
              break;
        }
      break;
    case 'UNIDENTISVIPEMPRESARIAL':
      $preco = 18;
      break;
    default:
      echo "<body onload='window.history.back();'>";
      exit;
      break;
  }

  

if(!empty($infoLocal)):
    if($_SESSION['nomeplano'] === 'UNIDENTISVIPBOLETO' and $infoLocal === 'PB'){
        $plano = 13032;
    }elseif ($_SESSION['nomeplano'] === 'UNIDENTISVIPCARTAO' and $infoLocal === 'PB' OR $_SESSION['nomeplano'] == 'UNIDENTISVIP'){
        $plano = 13046;
    }elseif ($_SESSION['nomeplano'] === 'UNIDENTISVIPFAMILIACARTAO' and $infoLocal === 'PB' OR $_SESSION['nomeplano'] == 'UNIDENTISVIPFAMILIA'){
        $plano = 13050;
    }elseif($_SESSION['nomeplano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' and $infoLocal === 'PB' OR $_SESSION['nomeplano'] == 'UNIDENTISVIPUNIVERSITARIO') {
        $plano = 13051;
    }elseif($infoLocal === 'RN' and $_SESSION['nomeplano'] === 'UNIDENTISVIPBOLETO'){
        $plano = 13058;

    }elseif ($infoLocal === 'RN' and $_SESSION['nomeplano'] === 'UNIDENTISVIPCARTAO' OR $_SESSION['nomeplano'] == 'UNIDENTISVIP'){
        $plano = 13053;

    }elseif ($infoLocal === 'RN' and $_SESSION['nomeplano'] === 'UNIDENTISVIPFAMILIACARTAO' OR $_SESSION['nomeplano'] == 'UNIDENTISVIPFAMILIA'){
        $plano = 13055;

    }elseif ($infoLocal === 'RN' and $_SESSION['nomeplano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' OR $_SESSION['nomeplano'] == 'UNIDENTISVIPUNIVERSITARIO'){
        $plano = 13056;
    }
endif;

if($_SESSION['nomeplano'] === 'PLANOVIPORTOCARTAO' OR $_SESSION['nomeplano'] == 'UNIDENTISVIPORTO'){
    $plano = 13040;
}elseif($_SESSION['nomeplano'] === 'UNIDENTISVIPEMPRESARIAL'){
    $plano = 13034;
}

$result_usuario11 = "SELECT * from vendedor where email = '$dadosDependentes[vendedor]'";
$resultado_usuario11 = mysqli_query($conexao, $result_usuario11);
$row_usuario11 = mysqli_fetch_assoc($resultado_usuario11);
$vendedor = substr($row_usuario11['vendedor'] , 0 ,5);

while($row_usuario7 = mysqli_fetch_assoc($resultado_usuario7)){
    $row_usuario7['cpf'] = str_replace('-','',str_replace('.','', $row_usuario7['cpf']));
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
        $sql2 = "UPDATE dependentes SET status='Implantado', ativo = '0' WHERE  forekey ='$cpf'";
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
                    <span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <img style="margin-left:0%" src=  "http://unidentisdigital.com.br/assets/img/LOGO.png" style="margin-left:0%"alt="" width="220" height="120">
            <br>
                <h2>Dependente Incluído Com Sucesso</h2>
            </div>
            <div class="modal-footer">
               <a href="dependentes"> <button type="button" class="btn btn-secondary" style="font-weight: 500 !important;">Fechar</button></a>

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
        $_SESSION['erroS4D'] = $result['mensagem'];
        echo "<body onload='window.history.back();'>";
        exit;
    }
?>