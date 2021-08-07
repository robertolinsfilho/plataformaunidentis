<?php
session_start();
include_once"conexao.php";




$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$boleto = mysqli_real_escape_string($conexao, trim($_POST['inlineRadioOptions']));

$result_usuario = "SELECT * from dadospessoais where cpf = '$cpf'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
function generatePassword($qtyCaraceters = 8)
{
    //Letras minúsculas embaralhadas
    $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
 
    //Letras maiúsculas embaralhadas
    $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
 
    //Números aleatórios
    $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
    $numbers .= 1234567890;
 
    //Caracteres Especiais
    $specialCharacters = str_shuffle('!@#$%*-');
 
    //Junta tudo
    $characters = $capitalLetters.$smallLetters.$numbers.$specialCharacters;
 
    //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
    $password = substr(str_shuffle($characters), 0, $qtyCaraceters);
 
    //Retorna a senha
    return $password;
}

$_SESSION['senhaemail'] = generatePassword(5);
$sql = "INSERT INTO  contrato (cpf,nome,email,boleto,preco) 
VALUES ('$_SESSION[cpf]','$nome','$email','$boleto','$_SESSION[preco]')";
if($row_usuario['plano'] != 'UNIDENTISVIPEMPRESARIAL'){
    $sql2 = "UPDATE dadospessoais SET etapa = '6' , status ='Pag Pendente', ativo = '1' where cpf = $cpf";
}else{
    $sql2 = "UPDATE dadospessoais SET etapa = '6' , status ='Em Averbação', ativo = '1', pagamento = '1' where cpf = $cpf";
}



$sql4 = "INSERT INTO  usuario (usuario, senha) VALUES ('$email', '$_SESSION[senhaemail]')";
if($conexao->query($sql) === TRUE and $conexao->query($sql4) === TRUE and $conexao->query($sql2) === TRUE) {
    $_SESSION['status_cadastro'] = true;
    header('Location: http://unidentis.com.br');
}else{
    echo $conexao->$sql->Log::error('message');
}

$conexao->close();


?>