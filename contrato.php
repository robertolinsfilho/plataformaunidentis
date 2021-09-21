<?php
session_start();
include_once("conexao.php");



$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$boleto = mysqli_real_escape_string($conexao, trim($_POST['inlineRadioOptions']));
$plano = mysqli_real_escape_string($conexao, trim($_POST['plano']));


$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);


$sql = "INSERT INTO  contrato (cpf,nome,email,boleto,preco) 
VALUES ('$cpf','$nome','$email','$boleto','$_SESSION[preco]')";

if($plano === 'UNIDENTISVIPEMPRESARIAL'){
$sql2 = "UPDATE dadospessoais SET ativo = 1 , pagamento = 1, status = 'Em Averbação' where cpf='$cpf' ";
}else{
    $sql2 = "UPDATE dadospessoais SET ativo = 1 ,status = 'Pag Pendente' where cpf='$cpf' ";
   
}


if($conexao->query($sql) === TRUE and $conexao->query($sql2) === TRUE ) {
    $_SESSION['status_cadastro'] = true;
    header('Location: planocadastrado');
}

$conexao->close();
