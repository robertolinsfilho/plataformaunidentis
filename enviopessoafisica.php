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
$cpf     = str_replace("-", "", str_replace(".", "", $cpf));

$_SESSION['nome']    = $nome;
$_SESSION['cpf']     = $cpf;
$_SESSION['email']   = $email;
$_SESSION['celular'] = $celular;
$_SESSION['estado']  = $estado;
$_SESSION['plano']   = $plano;
$_SESSION['sus']     = $sus;
$_SESSION['initpass'] = strip_tags(generatePassword(6));
$_SESSION['forekey'] = md5(strtotime("last Sunday").strtotime("now"));

$forekey = $_SESSION['forekey'];
$initpass = $_SESSION['initpass'];

if($_SESSION['vendedor1'] === ''){

    $_SESSION['vendedor1'] = 'sac2@unidentis.com.br';

}

$date = date('Ym');
    $sql1 = "INSERT INTO dadospessoais (nome,email,cpf, cpf_titular,vendedor,celular,tipocliente,admissao,matricula,plano,sus,pessoa,local,etapa,1pag, forekey)
    VALUES ('$nome', '$email', '$cpf', '$cpf','$_SESSION[vendedor1]','$celular','$_SESSION[tipocliente]','$admissao','$matricula','$plano','$sus','$_SESSION[tipocliente]','$_SESSION[estado1]','2','$date', '$forekey')";

    $sql4 = "INSERT INTO  usuario (usuario, senha, forekey) VALUES ('$email', '$initpass', '$forekey')";
    
    if($conexao->query($sql1) && $conexao->query($sql4)){
        header('Location: formdadospessoais?#centro');
        exit;
    }else{
        echo $conexao->$sql1->Log::error('message');
    }



?>