<?php
session_start();
include("conexao.php");

$forekey = $_SESSION['forekey'];

$queryDadosGeraisAssociado = mysqli_query($conexao, "SELECT * from dadospessoais where forekey = '$forekey'");
$dadosGeraisAssociado = mysqli_fetch_assoc($queryDadosGeraisAssociado);

$cpf = $dadosGeraisAssociado['cpf'];

// Apaga se existir
$sql5 = "DELETE FROM fotos WHERE forekey='$forekey'";
$conexao->query($sql5);

if ($_FILES['arquivo0']){
    $file = $_FILES['arquivo0'];
    $formatoArquivo = explode('.', $file['name']);
    $rgfrente = uniqid() . '.' . $formatoArquivo[count($formatoArquivo) - 1];
    move_uploaded_file($file['tmp_name'], __DIR__ . '/fotos/' . $rgfrente);
}

if ($_FILES['arquivo1']){
    $file = $_FILES['arquivo1'];
    $formatoArquivo = explode('.', $file['name']);
    $rgverso = uniqid() . '.' . $formatoArquivo[count($formatoArquivo) - 1];
    move_uploaded_file($file['tmp_name'], __DIR__ . '/fotos/' . $rgverso);
}

if ($_FILES['arquivo2']){
    $file = $_FILES['arquivo2'];
    $formatoArquivo = explode('.', $file['name']);
    $cpf = uniqid() . '.' . $formatoArquivo[count($formatoArquivo) - 1];
    move_uploaded_file($file['tmp_name'], __DIR__ . '/fotos/' . $cpf);
}

if ($_FILES['arquivo3']){
    $file = $_FILES['arquivo3'];
    $formatoArquivo = explode('.', $file['name']);
    $compresidencia = uniqid() . '.' . $formatoArquivo[count($formatoArquivo) - 1];
    move_uploaded_file($file['tmp_name'], __DIR__ . '/fotos/' . $compresidencia);
}

if ($_FILES['arquivo4']){
    $file = $_FILES['arquivo4'];
    $formatoArquivo = explode('.', $file['name']);
    $cartao = uniqid() . '.' . $formatoArquivo[count($formatoArquivo) - 1];
    move_uploaded_file($file['tmp_name'], __DIR__ . '/fotos/' . $cartao);
}

if ($_FILES['arquivo5']){
    $file = $_FILES['arquivo5'];
    $formatoArquivo = explode('.', $file['name']);
    $outro = uniqid() . '.' . $formatoArquivo[count($formatoArquivo) - 1];
    move_uploaded_file($file['tmp_name'], __DIR__ . '/fotos/' . $outro);
}

$sql = "INSERT INTO fotos (cpf_titular,rgfrente,rgverso,cpf,compresidencia,cartao, outro, forekey)
 VALUES ('$cpf','$rgfrente', '$rgverso','$cpf', '$compresidencia','$cartao' ,'$outro', '$forekey')";

$sql2 = "UPDATE dadospessoais SET etapa = '4' where forekey = '{$forekey}'";
if($conexao->query($sql) === TRUE and $conexao->query($sql2) === TRUE) {
	$_SESSION['status_cadastro'] = true;
    echo "<script>window.location.assign('prcessa6')</script>";
    exit;
}

$conexao->close();
?>