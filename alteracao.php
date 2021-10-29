<?php
session_start();
include_once("conexao.php");

$email = $_POST['email'];

/***************************|-------|***********************************/

$cpf = $_GET['key'];
$id = $_GET['id'];
$x2 = $_POST['status'];
$x = $_POST['status'];
$rg = $_POST['rg'];
$expedidor = $_POST['expedidor'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$complemento = $_POST['complemento'];
$motivo = $_POST['motivo'];
$motivo1 = $_POST['motivo1'];
$nomecartao = $_POST['nomecartao'];
$numerocartao = $_POST['numerocartao'];
$validadecartao = $_POST['validadecartao'];
$sexo = $_POST['sexo'];
$observacao = $_POST['observacao'];
$emailVendedor = $dadosDoContrato['vendedor'];
$corretor = $_POST['corretor'];
$nome = $_POST['nome'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$date = "$ano";
$date .= "$mes";

// GET DADOS FROM DATABASE

$dadosDoContrato = "SELECT * from dadospessoais where forekey = '$cpf'";
$dadosDoContrato = mysqli_fetch_assoc(mysqli_query($conexao, $dadosDoContrato));

if ($x2 === 'Indeferido') {
  $motivo;
} elseif ($x2 === 'Cancelado') {
  $motivo = $motivo1;
}

if ($x2 === 'Alterar') {
  $sql  = "UPDATE dadospessoais SET observacao='$observacao' ,1pag = '$date' WHERE forekey='$cpf'";
  $sql1 = "UPDATE dadosprincipais SET rg='$rg', expedidor='$expedidor'  WHERE forekey='$cpf'";
  $sql2 = "UPDATE endereco SET cep='$cep', rua='$rua' ,numero='$numero', cidade='$cidade' ,estado='$estado', complemento='$complemento' WHERE forekey='$cpf' ";
  $sql3 = "UPDATE contratocartao SET nomecartao='$nomecartao', cartao='$numerocartao' ,mes='$validadecartao' WHERE forekey='$cpf' ";
  if ($conexao->query($sql) === TRUE and $conexao->query($sql1) === TRUE and $conexao->query($sql2) === TRUE  and $conexao->query($sql3) === TRUE) {
    header('Location: form-wizard.php?key=' . $cpf . '');
    exit;
  } else {
    echo "Error updating record: " . $conexao->error;
  }
}


if ($x2 === 'Indeferido' or  $x2 === 'Cancelado') {

  $sql3 = "UPDATE dadospessoais SET status='$x2', indeferida='$motivo' WHERE forekey='$cpf' ";

  if ($conexao->query($sql3) === TRUE) {
    header('Location: processa7.php?cpf=' . $dadosDoContrato['cpf'] . '&email=' . $email . '&nome=' . $nome . '&status=' . $x2 . '&corretor=' . $corretor . '&motivo=' . $motivo . '&vendedor='. $emailVendedor. '');
    exit;
  } else {
    // echo "Error updating record: " . $conexao->error;
  }
}

if ($x2 === 'Implantadas') {
  header('Location: enviofinal.php?key=' . $cpf);
  exit;
}

if ($x2 === 'Enviar para Analise') {
  $sql4 = "UPDATE dadospessoais SET pagamento='1', status = 'Em Analise' WHERE forekey='$cpf' ";
  if ($conexao->query($sql4) === TRUE) {
    header('Location: form-wizard.php?key=' . $cpf . '');
    exit;
  }
}

if ($x2 === 'Apagar Proposta') {

  $sql4 = "DELETE FROM dadospessoais  WHERE forekey='$cpf' ";
  $sql1 = "DELETE FROM dadosprincipais WHERE forekey='$cpf' ";
  $sql2 = "DELETE FROM dependentes WHERE forekey='$cpf' ";
  $sql3 = "DELETE FROM endereco WHERE forekey='$cpf' ";
  $sql5 = "DELETE FROM fotos WHERE forekey='$cpf' ";
  // $sql6 = "DELETE FROM contrato WHERE forekey='$cpf' ";
  $sql7 = "DELETE FROM contratocartao WHERE forekey='$cpf'";
  $sql8 = "DELETE FROM usuario WHERE forekey = '$cpf'";

  if ($conexao->query($sql1) === TRUE && $conexao->query($sql2) === TRUE && $conexao->query($sql3) === TRUE && $conexao->query($sql4) === TRUE && $conexao->query($sql5) === TRUE && $conexao->query($sql7) === TRUE && $conexao->query($sql8) === TRUE) {
    header('Location: form-wizard.php?key=' . $cpf . '');
    exit;
  }
}

if ($x2 === 'Enviar Email') {
  header('Location: processa3?key='.$cpf);
  exit;
}

if ($x2 === 'Cancelar') {
  $sql4 = "UPDATE dependentes SET ativo='0', status = 'Cancelado' WHERE forekey = '$cpf'";
  if ($conexao->query($sql4) === TRUE) {
    header('Location: resumodependente.php?key=' . $cpf . '&id=' . $id);
    exit;
  }
}

if ($x2 === 'Implantar') {
  header('Location: dependentess4.php?key=' . $cpf . '&id=' . $id);
  exit;
}


if ($x2 === 'Indeferir') {
  $sql4 = "UPDATE dependentes SET  status = 'Indeferido' WHERE forekey = '$cpf' '";
  if ($conexao->query($sql4) === TRUE) {
    header('Location: resumodependente.php?key=' . $cpf . '&id=' . $id);
    exit;
  }
}

$conexao->close();
