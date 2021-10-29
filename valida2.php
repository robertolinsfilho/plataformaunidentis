<?php
include_once('conexao.php');
session_start();

$usuario =  $_POST['usuario'];
$senha =  $_POST['senha'];

$query = "select * from usuario where usuario = '$usuario' and senha = '$senha'";
$result = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($result);

$_SESSION['emailplataforma'] = $usuario;
$forekey = $row['forekey'];

$result_usuario = "SELECT * from dadospessoais where forekey = '$forekey'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

if($row_usuario['status'] === 'Cancelado'){
    header('Location: login2');
}

if(isset($row_usuario)){
    header('Location: andamento');
}

if($row['acesso'] === '0'){
    header('Location: novasenha');
    $_SESSION['usuario1'] = $usuario;

}else{
 
    if(isset($row)) {
        $_SESSION['usuario1'] = $usuario;
        $_SESSION['senha1'] = $senha;

        if($row_usuario['plano'] === 'UNIDENTISVIPBOLETO'  ){
           header('Location: areaclienteboleto?key='. $forekey);
        }elseif ($row_usuario['plano']==='UNIDENTISVIPEMPRESARIAL'){
           header('Location: areaclienteboleto?key='. $forekey);
        }else{
            header('Location: areacliente?key='. $forekey);
        }

    }else{
        $_SESSION['nao_autenticado'] = true;
        header('Location: login2');
    }
}








?>