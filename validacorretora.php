<?php
include_once('conexao.php');
session_start();

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);


$result_usuario = "select * from corretora where email = '{$usuario}' ";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

$cpf = substr($row_usuario['senha'] , 0 ,6) ;

echo $cpf;
"<br>";
echo $senha;

if(isset($row_usuario) && $cpf == $senha) {
    $_SESSION['usuario'] = 'corretora';
    $_SESSION['senha'] = $senha;
    $_SESSION['corretora'] = $usuario;
    header('Location: indexcorretora');
    exit();

}else{
    $_SESSION['nao_autenticado'] = true;

    header('Location: logincorretora');

    exit();
}



?>