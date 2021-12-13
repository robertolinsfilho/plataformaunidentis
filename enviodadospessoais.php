<?php
session_start();
include_once("conexao.php");

// Dados pessoais
$_SESSION['sexo']        = mysqli_real_escape_string($conexao, trim($_POST['sexo']));
$_SESSION['whats']       = mysqli_real_escape_string($conexao, trim($_POST['whats']));
$_SESSION['rg']          = mysqli_real_escape_string($conexao, trim($_POST['rg']));
$_SESSION['estadocivil'] = mysqli_real_escape_string($conexao, trim($_POST['estadocivil']));
$_SESSION['datas']       = mysqli_real_escape_string($conexao, trim($_POST['datas']));
$_SESSION['expedidor']   = mysqli_real_escape_string($conexao, trim($_POST['expedidor']));
$_SESSION['mae']         = mysqli_real_escape_string($conexao, trim($_POST['mae']));
$_SESSION['fixo']        = mysqli_real_escape_string($conexao, trim($_POST['fixo']));

// Dados endereco
$_SESSION['cep']         = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$_SESSION['rua']         = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$_SESSION['numero']      = mysqli_real_escape_string($conexao, trim($_POST['numero']));
$_SESSION['bairro']      = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$_SESSION['cidade']      = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$_SESSION['estado']      = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$_SESSION['complemento'] = mysqli_real_escape_string($conexao, trim($_POST['complemento']));


$_SESSION['forekey']     = mysqli_real_escape_string($conexao, trim($_POST['forekey']));

$forekey     = $_SESSION['forekey'];
$cpf         = $_SESSION['cpf'];
$mae         = $_SESSION['mae'];
$data        = $_SESSION['datas'];
$sexo        = $_SESSION['sexo'];
$civil       = $_SESSION['estadocivil'];
$cep         = $_SESSION['cep'];
$rua         = $_SESSION['rua'];
$numero      = $_SESSION['numero'];
$bairro      = $_SESSION['bairro'];
$cidade      = $_SESSION['cidade'];
$estado      = $_SESSION['estado'];
$complemento = $_SESSION['complemento'];

// ATUALIZA O ASSOCIADO COM NOVOS DADOS
$sql ="UPDATE dadospessoais SET mae = '{$mae}', estado = '{$civil}', nascimento = '{$data}', sexo = '{$sexo}', etapa = '3' WHERE  forekey ='{$forekey}'";

// ADICIONA OS DADOS PRINCIPAIS DO ASSOCIADO A TABELA COM MESMO NOME
$sql2 = "UPDATE dadosprincipais SET sexo='{$sexo}', whats= '{$_SESSION['whats']}', rg= '{$_SESSION['rg']}', estadocivil = '{$civil}', datas= '{$data}', expedidor= '{$_SESSION['expedidor']}', mae = '{$mae}' WHERE  forekey ='{$forekey}'";

// Deleta endereco caso exista
$sql4 = "DELETE * FROM endereco WHERE forekey ='{$forekey}'";

// Adiciona esse endereco
$sql4 = "INSERT INTO endereco ( cpf, cep, rua, numero, bairro, cidade, estado, complemento, forekey ) VALUES ('$cpf', '$cep', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$complemento', '$forekey')";

if($conexao->query($sql) && $conexao->query($sql2) && $conexao->query($sql4)){
    
   if($_SESSION['plano'] =='UNIDENTISVIPBOLETO'){
       header('Location: formenviofotos#form1');
    }else{
        header('Location: formenviofotoscartao?#form1');
    }

}else{
    echo $conexao->$sql->Log::error('message');
}

exit;
?>