<?php
session_start();

include_once('conexao.php');
$id = $_GET['id'];

$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

$sql = "DELETE FROM `dependentes` WHERE id ='$id'";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}

header('Location: cadastrodependentes.php');
$conexao->close();
?>

?>