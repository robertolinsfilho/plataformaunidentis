<?php
session_start();
include_once('conexao.php');

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$_SESSION['email']  = $post['email'];
$nome               = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$cpf                = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$cpf                = str_replace("-", "", str_replace(".", "", $cpf));
$result_usuario     = "SELECT * from contratocartao where cpf = '$cpf'";
$resultado_usuario  = mysqli_query($conexao, $result_usuario);
$row_usuario        = mysqli_fetch_assoc($resultado_usuario);

$result_usuario1    = "SELECT * from contratocartao where cpf = '$cpf'";
$resultado_usuario1 = mysqli_query($conexao, $result_usuario1);
$row_usuario1       = mysqli_fetch_assoc($resultado_usuario1);

$result_usuario3    = "SELECT * from dadospessoais where status = 'Implantadas'";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3       = mysqli_fetch_assoc($resultado_usuario3);

$result_usuario4    = "SELECT * from dadospessoais where cpf= $cpf and status != 'Cancelado'";
$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
$row_usuario4       = mysqli_fetch_assoc($resultado_usuario4);

$result_usuario5    = "SELECT * from dadospessoais where email= '$_SESSION[email]' and status != 'Cancelado'";
$resultado_usuario5 = mysqli_query($conexao, $result_usuario5);
$row_usuario5       = mysqli_fetch_assoc($resultado_usuario5);


$url  = "http://unidentis.s4e.com.br/v2/api/associados?token=RWNTF7PUC87KRYRTVNFGP8XNYWJ4DQC4XWCGSHPW2F9FCURP82&cpfAssociado=$cpf";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($curl), true);
$resultado = $resultado['dados'];
$x = 0;



// foreach ($resultado as $value) {
//     // var_dump($resultado);
//     foreach ($value['dependentes'] as $value1) {
//         foreach ((array)$value1['nomeSituacao'] as $value2) {
//             if ($value2 != 'CANCELADO') {
//                 $x = 1;
//             }
//         }
//     }
// }

// if ($x == 1 or isset($row_usuario4['cpf']) or isset($row_usuario5['email'])) {

?>
    <!-- <html>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#myModal').modal('show');
            });
        </script>
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
                        <h4>CPF ou Email Já está vinculado a um plano</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="dadospessoais" type="button" class="btn btn-secondary">Fechar</a>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html> -->

<?php

// } else {

    $email             = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $fixo              = mysqli_real_escape_string($conexao, trim($_POST['fixo']));
    $telefone          = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $sexo              = mysqli_real_escape_string($conexao, trim($_POST['sexo']));
    $rg                = mysqli_real_escape_string($conexao, trim($_POST['rg']));
    $mae               = mysqli_real_escape_string($conexao, trim($_POST['mae']));
    $estado            = mysqli_real_escape_string($conexao, trim($_POST['estado']));
    $sus               = mysqli_real_escape_string($conexao, trim($_POST['sus']));
    $cep               = mysqli_real_escape_string($conexao, trim($_POST['cep']));
    $rua               = mysqli_real_escape_string($conexao, trim($_POST['rua']));
    $numero            = mysqli_real_escape_string($conexao, trim($_POST['numero']));
    $complemento       = mysqli_real_escape_string($conexao, trim($_POST['complemento']));
    $uf                = mysqli_real_escape_string($conexao, trim($_POST['uf']));
    $cidade            = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
    $bairro            = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
    $plano             = mysqli_real_escape_string($conexao, trim($_POST['plano']));
    $nascimento        = mysqli_real_escape_string($conexao, trim($_POST['nascimento']));
    $emissor           = mysqli_real_escape_string($conexao, trim($_POST['emissor']));
    $emissor           = mysqli_real_escape_string($conexao, trim($_POST['emissor']));
    $nometitular       = mysqli_real_escape_string($conexao, trim($_POST['nometitular']));
    $cpftitular        = mysqli_real_escape_string($conexao, trim($_POST['cpftitular']));
    $nascimentotitular = mysqli_real_escape_string($conexao, trim($_POST['nascimentotitular']));
    $estadotitular     = mysqli_real_escape_string($conexao, trim($_POST['estadotitular']));
    $sexotitular       = mysqli_real_escape_string($conexao, trim($_POST['sexotitular']));
    $maetitular        = mysqli_real_escape_string($conexao, trim($_POST['maetitular']));
    $sustitular        = mysqli_real_escape_string($conexao, trim($_POST['sustitular']));

    $_SESSION['nometitular'] = $_POST['nometitular'];
    $_SESSION['cpftitular']  = $_POST['cpftitular'];
    $_SESSION['cpftitular1'] = $_POST['cpftitular'];

    $_SESSION['nascimentotitular'] = $_POST['nascimentotitular'];
    $_SESSION['estadotitular']     = $_POST['estadotitular'];
    $_SESSION['sexotitular']       = $_POST['sexotitular'];
    $_SESSION['maetitular']        = $_POST['maetitular'];
    $_SESSION['sustitular']        = $_POST['sustitular'];
    $_SESSION['nome']              = $_POST['nome'];
    $_SESSION['cpftitular1']       = str_replace(".", "", $_SESSION['cpftitular1']);
    $_SESSION['cpftitular1']       = str_replace("-", "", $_SESSION['cpftitular1']);

    echo $_SESSION['cpftitular1'];

    $cpf                     = str_replace(".", "", $cpf);
    $cpf                     = str_replace("-", "", $cpf);
    $_SESSION['cpf']         = $_POST['cpf'];
    $_SESSION['email']       = $_POST['email'];
    $_SESSION['fixo']        = $_POST['fixo'];
    $_SESSION['telefone']    = $_POST['telefone'];
    $_SESSION['sexo']        = $_POST['sexo'];
    $_SESSION['rg']          = $_POST['rg'];
    $_SESSION['nascimento']  = $_POST['nascimento'];
    $_SESSION['mae']         = $_POST['mae'];
    $_SESSION['estado']      = $_POST['estado'];
    $_SESSION['sus']         = $_POST['sus'];
    $_SESSION['cep']         = $_POST['cep'];
    $_SESSION['rua']         = $_POST['rua'];
    $_SESSION['numero']      = $_POST['numero'];
    $_SESSION['uf']          = $_POST['uf'];
    $_SESSION['complemento'] = $_POST['complemento'];
    $_SESSION['cidade']      = $_POST['cidade'];
    $_SESSION['bairro']      = $_POST['bairro'];
    $_SESSION['plano']       = $_POST['plano'];
    $_SESSION['emissor']     = $_POST['emissor'];
    $_SESSION['admissao']    = $_POST['admissao'];
    $_SESSION['matricula']   = $_POST['matricula'];

    header('Location: cadastrodependentes');
    exit;
// }

$conexao->close();

?>