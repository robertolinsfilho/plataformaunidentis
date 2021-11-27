<?php
session_start();
include("conexao.php");
$result_usuario = "SELECT * from dadospessoais where cpf ='$_SESSION[cpf]'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);



$_SESSION['cep'] = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$_SESSION['rua'] = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$_SESSION['numero'] = mysqli_real_escape_string($conexao, trim($_POST['numero']));
$_SESSION['bairro'] = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$_SESSION['cidade'] = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$_SESSION['estado2'] = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$_SESSION['complemento'] = mysqli_real_escape_string($conexao, trim($_POST['complemento']));

$sql3 = "INSERT INTO endereco (cpf,cep,rua,numero,bairro,cidade,estado,complemento)
VALUES ('$_SESSION[cpf]','$_SESSION[cep]','$_SESSION[rua]','$_SESSION[numero]','$_SESSION[bairro]','$_SESSION[cidade]','$_SESSION[estado2]', '$_SESSION[complemento]')";
$sql4 = "UPDATE dadospessoais SET etapa = '5' where cpf = '$_SESSION[cpf]'";

if($conexao->query($sql3) === TRUE && $conexao->query($sql4) === TRUE){
    if($row_usuario['plano']=='UNIDENTISVIPBOLETO' or $row_usuario['plano'] == 'UNIDENTISVIPEMPRESARIAL'){
        header('Location: titular');
      
    }elseif($row_usuario['plano']=='UNIDENTISVIPCARTAO'){
        header('Location: titularcartao');
    }elseif($row_usuario['plano']=='UNIDENTISVIPFAMILIACARTAO'){
        header('Location: titularcartao');
    }else{
       header('Location: titularcartao');
    }
}else{
    echo $conexao->$sql1->Log::error('message');
}

exit;
?>