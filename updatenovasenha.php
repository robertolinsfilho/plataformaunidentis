<?php
include_once('conexao.php');
session_start();
if(isset($_SESSION['emailsenha'])){
    $usuario= $_SESSION['emailsenha'];
}else{
$usuario= $_SESSION['usuario1'];
}
$senha = $_POST['senha'];

$query = "UPDATE usuario SET senha  = '{$senha}' where usuario = '{$usuario}' ";



$query1 = "UPDATE usuario SET senha  = '{$senha}', acesso = 1 where usuario = '{$usuario}' ";


if($conexao->query($query) === TRUE && $conexao->query($query1)) {

    unset($_SESSION['emailsenha']);
   header('Location: login2');
    exit();

}else{
    $_SESSION['nao_autenticado'] = true;
  header('Location: login2');
    exit();
}
?>