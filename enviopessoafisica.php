<?php
session_start();
include("conexao.php");



function generatePassword($qtyCaraceters = 8)
{
    //Letras minúsculas embaralhadas
    $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
 
    //Números aleatórios
    $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
    $numbers .= 1234567890;
 
    //Junta tudo
    $characters = $numbers.$numbers.$numbers.$numbers;
 
    //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
    $password = substr(str_shuffle($characters), 0, $qtyCaraceters);
 
    //Retorna a senha
    return $password;
}

$nome    = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email   = mysqli_real_escape_string($conexao, trim($_POST['email']));
$cpf     = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$celular = mysqli_real_escape_string($conexao, trim($_POST['celular']));
$estado  = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$plano   = mysqli_real_escape_string($conexao, trim($_POST['plano']));
$sus     = mysqli_real_escape_string($conexao, trim($_POST['sus']));
$matricula = mysqli_real_escape_string($conexao, trim($_POST['matricula']));
$admissao = mysqli_real_escape_string($conexao, trim($_POST['admissao']));
$date = date('Ym');

$cpf     = str_replace("-", "", str_replace(".", "", $cpf));

$_SESSION['nome']    = $nome;
$_SESSION['cpf']     = $cpf;
$_SESSION['email']   = $email;
$_SESSION['celular'] = $celular;
$_SESSION['estado']  = $estado;
$_SESSION['plano']   = $plano;
$_SESSION['sus']     = $sus;
$_SESSION['initpass'] = 'u'.strip_tags(generatePassword(5));
$_SESSION['forekey'] = md5(strtotime("last Sunday").strtotime("now"));

$forekey = $_SESSION['forekey'];
$initpass = $_SESSION['initpass'];


/** PRECO **/
if ($_SESSION['plano'] == 'UNIDENTISVIPBOLETO' && $_SESSION['estado1'] == 'PB') {
  $preco = 40;
} 
if ($_SESSION['plano'] == 'PLANOVIPORTOCARTAO'){
  $preco = 99.00;
}

if (
  $_SESSION['plano'] ==
  'UNIDENTISVIPBOLETO' && $_SESSION['estado1'] == 'RN'
) {
  $preco = 40;
} elseif (
  $_SESSION['plano'] == 'UNIDENTISVIPBOLETO'
  && $cont >= 1 && $_SESSION['estado1'] == 'RN'
) {
  $preco = 35;
} elseif (
  $_SESSION['plano'] == 'UNIDENTISVIPEMPRESARIAL' &&
  $_SESSION['estado1'] == 'RN'
) {
  $preco = 18;
}
if (
  $_SESSION['plano'] ==
  'UNIDENTISVIPCARTAO' && $_SESSION['estado1'] === 'PB'
) {
  $preco = 23.90;
} elseif (
  $_SESSION['plano'] ==
  'UNIDENTISVIPCARTAO' && $_SESSION['estado1'] == 'PB' && $cont >= 1
) {
  $preco = 22.90;
} elseif (
  $_SESSION['plano'] ==
  'UNIDENTISVIPFAMILIACARTAO' && $_SESSION['estado1'] ===
  'PB'
) {
  $preco = 60;
} elseif (
  $_SESSION['plano'] ==
  'UNIDENTISVIPFAMILIACARTAO' && $cont == 1 && $_SESSION['estado1'] ==
  'PB'
) {
  $preco = 30;
} elseif (
  $_SESSION['plano'] ==
  'UNIDENTISVIPFAMILIACARTAO' && $cont >= 2 && $_SESSION['estado1'] ==
  'PB'
) {
  $preco = 20;
} elseif (
  $_SESSION['plano'] ==
  'UNIDENTISVIPUNIVERSITARIOCARTAO' &&
  $_SESSION['estado1'] == 'PB'
) {
  $preco = 21.90;
} elseif (
  $_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
  && $cont == 1 && $_SESSION['estado1'] == 'PB'
) {
  $preco = 20.90;
} elseif (
  $_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
  && $cont >= 2 && $_SESSION['estado1'] == 'PB'
) {
  $preco = 19.90;
}
if (
  $_SESSION['plano'] == 'UNIDENTISVIPCARTAO' && $_SESSION['estado1']
  === 'RN'
) {
  $preco = 25.90;
} elseif (
  $_SESSION['plano'] == 'UNIDENTISVIPCARTAO' &&
  $_SESSION['estado1'] == 'RN' && $cont >= 1
) {
  $preco = 24.90;
} elseif (
  $_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO'  && $_SESSION['estado1'] == 'RN'
) {
  $preco = 66;
} elseif (
  $_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' &&
  $cont == 1 && $_SESSION['estado1'] == 'RN'
) {
  $preco = 33;
} elseif (
  $_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' &&
  $cont >= 2 && $_SESSION['estado1'] == 'RN'
) {
  $preco = 22;
} elseif (
  $_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
 && $_SESSION['estado1'] == 'RN'
) {
  $preco = 25;
} elseif (
  $_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
  && $cont == 1 && $_SESSION['estado1'] == 'RN'
) {
  $preco = 24;
} elseif (
  $_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
  && $cont >= 2 && $_SESSION['estado1'] == 'RN'
) {
  $preco = 23;
}


if($_SESSION['vendedor1'] === ''){

    $_SESSION['vendedor1'] = 'sac2@unidentis.com.br';

}


$sql1 = "INSERT INTO dadospessoais ( nome, email, cpf, cpf_titular, vendedor, celular, tipocliente, admissao, matricula, plano, sus, pessoa,local, etapa, 1pag, preco, forekey)
VALUES ('$nome', '$email', '$cpf', '$cpf','$_SESSION[vendedor1]','$celular','$_SESSION[tipocliente]','$admissao','$matricula','$plano','$sus','$_SESSION[tipocliente]','$_SESSION[estado1]','2','$date', '$preco', '$forekey')";

$sql2 = "INSERT INTO dadosprincipais ( nome, email, cpf, celular, initpass, forekey)
VALUES ('$nome', '$email','$cpf','$celular', '$initpass', '$forekey')";

$sql4 = "INSERT INTO  usuario (usuario, senha, forekey) VALUES ('$email', '$initpass', '$forekey')";

if($conexao->query($sql1) && $conexao->query($sql2) && $conexao->query($sql4)){
    header('Location: formdadospessoais?#centro');
    exit;
}else{
    echo $conexao->$sql1->Log::error('message');
}



?>