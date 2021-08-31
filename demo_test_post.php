<?php 

include_once "conexao.php";
$nome = $_POST['nome'];
$sql1 = "INSERT INTO dependentes (nome)
 VALUES ('$nome')";


$conexao->query($sql1);
    