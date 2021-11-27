<?php
include_once('conexao.php');
session_start();

$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

$usuario = $_SESSION['emailplataforma'];
$senha   = $post['senha'];
$forekey = $post['forekey'];

$query = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha'";
$result = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($result);

if(isset($row)):
    $_SESSION['senhaInvalida'] = true;
    echo "<body onload='window.history.back();'>";
    exit();
else:
    $query = "UPDATE usuario SET senha  = '{$senha}' where forekey = '{$forekey}' ";

    $query1 = "UPDATE usuario SET senha  = '{$senha}', acesso = 1 where forekey = '{$forekey}' ";
    
    if($conexao->query($query) === TRUE && $conexao->query($query1)) {
    
       header('Location: login2');
        exit();
    
    }else{
        $_SESSION['nao_autenticado'] = true;
      header('Location: login2');
        exit();
    }
endif;


?>