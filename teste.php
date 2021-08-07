<?php
session_start();
error_reporting(0);
include_once 'conexao.php';
$codigo = 'rXyWa';
$x = 0;


    
$result_usuario = "SELECT * FROM dependentes where cpf_titular = '44686387027'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
  echo $row_usuario['senha'];
  
}

/*

if($x == 1){
    $_SESSION['sms'] = 'Codigo Correto , Dependente enviado para analise!';
    header('Location: confirmacao');
}else{
    $_SESSION['sms'] = 'Codigo Incorreto , Porfavor faça novamente o processo!';
    header('Location: confirmacao');
}
*/

echo $x;
?>

