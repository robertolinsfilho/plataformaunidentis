<?php
session_start();
include_once "conexao.php";

$parentesco = $_POST['parentesco'];
$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$cpf = $_POST['cpf'];
$sus = $_POST['sus'];
$telefone = $_POST['telefone'];
$estado = $_POST['estado'];
$sexo = $_POST['sexo'];
$mae = $_POST['mae'];

$sql = "INSERT INTO  dependentes (cpf_titular, nome, cpf ,datas, cns ,estadocivil, sexo, mae,parentesco) 
VALUES ('$_SESSION[cpf]','$nome','$cpf','$nascimento','$sus','$estado','$sexo','$mae','$parentesco')";


if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
    header('Location: index.html');
}

$conexao->close();


header('Location: incluirdependentes2.php?cpf='.$_SESSION['cpf']);
