<?php 

include_once "conexao.php";
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$parentesco = $_POST['parentesco'];
$estado = $_POST['estado'];
$sexo = $_POST['sexo'];
$mae = $_POST['mae'];
$cns = $_POST['cns'];
$cpftitular = $_POST['cpftitular'];

 $cpf = str_replace(".", "", $cpf);
 $cpf = str_replace("-", "", $cpf);
 $cpftitular = str_replace(".", "", $cpftitular);
 $cpftitular = str_replace("-", "", $cpftitular);


$sql1 = "INSERT INTO dependentes (cpf_titular, nome, cpf,datas,cns,estadocivil,sexo,mae,parentesco)
 VALUES ('$cpftitular','$nome','$cpf','$data','$cns','$estado','$sexo','$mae','$parentesco')";


$conexao->query($sql1);
    