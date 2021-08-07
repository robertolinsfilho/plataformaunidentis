<?php
include_once('conexao.php');
session_start();

 $usuario =  $_POST['usuario'];
 $senha =  $_POST['senha'];

 $_SESSION['emailplataforma'] = $usuario;

$result_usuario = "SELECT * from dadospessoais where email ='$_SESSION[emailplataforma]'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$result_usuario2 = "SELECT * from usuario where usuario ='$_SESSION[emailplataforma]'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
$result_usuario3 = "SELECT * from dadospessoais where email ='$_SESSION[emailplataforma]'";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);

if($row_usuario3['status'] === 'Cancelado'){
    header('Location: login2');
}


if(isset($row_usuario)){
    header('Location: andamento');
   
}

if($row_usuario2['acesso'] === '0'){

    header('Location: novasenha');
    $_SESSION['usuario1'] = $usuario;

}else{

    $query = "select * from usuario where usuario = '$usuario' and senha = '$senha'";

    $result = mysqli_query($conexao, $query);

    $row = mysqli_fetch_assoc($result);
 


    if(isset($row) ) {

        $_SESSION['usuario1'] = $usuario;
        $_SESSION['senha1'] = $senha;
        if($row_usuario['plano'] === 'UNIDENTISVIPBOLETO'  ){
           header('Location: areaclienteboleto');
        }elseif ($row_usuario['plano']==='UNIDENTISVIPEMPRESARIAL'){
           header('Location: areaclienteboleto');
        }else{
            header('Location: areacliente');
        }


    }else{
        $_SESSION['nao_autenticado'] = true;
      header('Location: login2');

    }
}








?>