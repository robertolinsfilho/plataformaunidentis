<?php
session_start();
include_once("conexao.php");

print_r($_SESSION['plano']);

$_SESSION['sexo']        = mysqli_real_escape_string($conexao, trim($_POST['sexo']));
$_SESSION['whats']       = mysqli_real_escape_string($conexao, trim($_POST['whats']));
$_SESSION['rg']          = mysqli_real_escape_string($conexao, trim($_POST['rg']));
$_SESSION['estadocivil'] = mysqli_real_escape_string($conexao, trim($_POST['estadocivil']));
$_SESSION['datas']       = mysqli_real_escape_string($conexao, trim($_POST['datas']));
$_SESSION['expedidor']   = mysqli_real_escape_string($conexao, trim($_POST['expedidor']));
$_SESSION['mae']         = mysqli_real_escape_string($conexao, trim($_POST['mae']));
$_SESSION['fixo']        = mysqli_real_escape_string($conexao, trim($_POST['fixo']));
$_SESSION['forekey']     = mysqli_real_escape_string($conexao, trim($_POST['forekey']));


$forekey = $_SESSION['forekey'];
$cpf = $_SESSION['cpf'];
$mae = $_SESSION['mae'];
$data = $_SESSION['datas'];
$sexo = $_SESSION['sexo'];
$civil = $_SESSION['estadocivil'];


// ATUALIZA O ASSOCIADO COM NOVOS DADOS
$sql ="UPDATE dadospessoais SET mae = '{$mae}', estado = '{$civil}', nascimento = '{$data}', sexo = '{$sexo}' , local = '{$_SESSION['estado1']}', etapa = '3' WHERE  forekey ='{$forekey}'";

// ADICIONA OS DADOS PRINCIPAIS DO ASSOCIADO A TABELA COM MESMO NOME
$sql2 = "INSERT INTO dadosprincipais (cpf,celular,sexo,whats,rg,estadocivil,expedidor,mae,forekey)
VALUES ( '$cpf','$_SESSION[whats]','$sexo','$_SESSION[whats]','$_SESSION[rg]','$civil','$_SESSION[expedidor]','$mae', '$forekey')";

if($conexao->query($sql) && $conexao->query($sql2)){
    
   if($_SESSION['plano'] =='UNIDENTISVIPBOLETO'){
       header('Location: formenviofotos#form1');
    }elseif($_SESSION['plano'] =='UNIDENTISVIPEMPRESARIAL'){
        header('Location: formendereco?#form1');
    }else{
        header('Location: formenviofotoscartao?#form1');
    }

}else{
    echo $conexao->$sql->Log::error('message');
}

exit;
?>