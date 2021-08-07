<?php
session_start();
include("conexao.php");



$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$sexo = mysqli_real_escape_string($conexao, trim($_POST['sexo']));
$estadocivil = mysqli_real_escape_string($conexao, trim($_POST['estadocivil']));
$datas = mysqli_real_escape_string($conexao, trim($_POST['datas']));
$mae = mysqli_real_escape_string($conexao, trim($_POST['mae']));
$cpf_titular = mysqli_real_escape_string($conexao, trim($_POST['cpf_titular']));
$cpf_titular = str_replace(".", "", $cpf_titular);
$cpf_titular = str_replace("-", "", $cpf_titular);
$cns = mysqli_real_escape_string($conexao, trim($_POST['cns']));
$parentesco = mysqli_real_escape_string($conexao, trim($_POST['parentesco']));

$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);


$sql = "INSERT INTO dependentes (nome, cpf, sexo, estadocivil, datas, mae, cpf_titular, cns,parentesco) 
VALUES ('$nome', '$cpf','$sexo', '$estadocivil','$datas','$mae','$cpf_titular','$cns','$parentesco')";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
    if($_SESSION['boleto']=='UNIDENTISVIPBOLETO'){
        header('Location: titular');
    }elseif($_SESSION['boleto']=='UNIDENTISVIPCARTAO'){
        header('Location: titularcartao');
    }elseif($_SESSION['boleto']=='UNIDENTISVIPFAMILIACARTAO'){
        header('Location: titularcartao');
    }else{
        header('Location: titularcartao');
    }
}



$conexao->close();

exit;
?>