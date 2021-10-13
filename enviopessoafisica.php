<?php
session_start();
include("conexao.php");

print_r($_POST);

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));

$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);
$celular = mysqli_real_escape_string($conexao, trim($_POST['celular']));
$estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$plano = mysqli_real_escape_string($conexao, trim($_POST['plano']));
$sus = mysqli_real_escape_string($conexao, trim($_POST['sus']));
// $matricula = mysqli_real_escape_string($conexao, trim($_POST['matricula']));
// $admissao = mysqli_real_escape_string($conexao, trim($_POST['admissao']));

$_SESSION['nome']= $nome;
$_SESSION['cpf']= $cpf;
$_SESSION['email'] = $email;

$_SESSION['celular'] = $celular;
$_SESSION['estado'] = $estado;
$_SESSION['plano'] = $plano;
$_SESSION['sus'] = $sus;
if($_SESSION['vendedor1'] === ''){
    $_SESSION['vendedor1'] = 'sac2@unidentis.com.br';
}
$date = date('Ym');
 $sql1 = "INSERT INTO dadospessoais (nome,email,senha,cpf,vendedor,celular,estado,tipocliente,admissao,matricula,plano,sus,pessoa,local,etapa,1pag)
 VALUES ('$nome', '$email','$_SESSION[senha]', '$_SESSION[cpf]','$_SESSION[vendedor1]','$_SESSION[celular]','$_SESSION[estado1]','$_SESSION[tipocliente]','$admissao','$matricula','$_SESSION[plano]','$_SESSION[sus]','$_SESSION[tipocliente]','$_SESSION[estado1]','2','$date')";


if($conexao->query($sql1) === TRUE ){
    // header('Location: formdadospessoais?#centro');
}else{
    echo $conexao->$sql1->Log::error('message');
}


exit;
?>