<?php
session_start();
include("conexao.php");

$boleto40 = mysqli_real_escape_string($conexao, trim($_POST['boleto40']));

$_SESSION['boleto'] = $boleto40;


if($boleto40 ==='UNIDENTIS VIP BOLETO'){
    $_SESSION['boleto'] = 'UNIDENTISVIPBOLETO';
    $_SESSION['tipocliente'] = 'pessoafisica';
    header('Location: formpessoafisica#centro');
}elseif($boleto40 ==='UNIDENTIS VIP CARTÃO'){
    $_SESSION['boleto'] = 'UNIDENTISVIPCARTAO';
    $_SESSION['tipocliente'] = 'pessoafisica';
    header('Location: formpessoafisica#centro');
}elseif($boleto40 ==='UNIDENTIS VIP FAMÍLIA CARTÃO'){
    $_SESSION['boleto'] = 'UNIDENTISVIPFAMILIACARTAO';
    $_SESSION['tipocliente'] = 'pessoafisica';
    header('Location: formpessoafisica#centro');
}elseif($boleto40 ==='UNIDENTIS VIP UNIVERSITÁRIO'){
    $_SESSION['boleto']= 'UNIDENTISVIPUNIVERSITARIOCARTAO';
    $_SESSION['tipocliente'] = 'pessoafisica';
    header('Location: formpessoafisica#centro');
}elseif($boleto40 ==='UNIDENTIS VIP EMPRESARIAL'){
    $_SESSION['boleto']= 'UNIDENTISVIPEMPRESARIAL';
    $_SESSION['tipocliente'] = 'servidorpublico';
    header('Location: formpessoafisica#centro');
}elseif($boleto40 === 'UNIDENTIS VIP ORTO'){
    $_SESSION['boleto']= 'PLANOVIPORTOCARTAO';
    $_SESSION['tipocliente'] = 'pessoafisica';
    header('Location: formpessoafisica#centro');
}



?> 