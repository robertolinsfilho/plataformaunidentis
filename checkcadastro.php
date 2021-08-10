<?php 
include_once "conexao.php";
$nome = $_POST['plano'];

echo $nome;
?>
<html>
    <h4>entrou<?php echo $nome ?></h4>
</html>