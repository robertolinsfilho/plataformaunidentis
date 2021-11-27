<?php
session_start();
include("conexao.php");

$forekey = $_GET['key'];

$queryDadosGeraisAssociado = mysqli_query($conexao, "SELECT * from dadospessoais where forekey = '$forekey'");
$dadosGeraisAssociado = mysqli_fetch_assoc($queryDadosGeraisAssociado);

$cpf_titular = $dadosGeraisAssociado['cpf'];

// Apaga se existir
$queryFotosAssociado = mysqli_query($conexao, "SELECT * from fotos where forekey = '$forekey'");

if($fotosAssociado = mysqli_fetch_assoc($queryFotosAssociado)):
    foreach($fotosAssociado as $key => $value):
        if($key == 'forekey' || $key == 'id' || $key == 'cpf_titular'):
            continue;
        endif;
        $path = __DIR__.'/fotos/'.$value;
        if (file_exists($path)):
            @unlink($path);
        endif;
    endforeach;
    
    $sql5 = "DELETE FROM fotos WHERE forekey='$forekey'";
    $conexao->query($sql5);
endif;

if ($_FILES['arquivo10']){
    $file = $_FILES['arquivo10'];
    $formatoArquivo = explode('.', $file['name'][0]);
    $rgfrente = uniqid() . '.' . end($formatoArquivo);
    move_uploaded_file($file['tmp_name'][0], __DIR__ . '/fotos/' . $rgfrente);
}

if ($_FILES['arquivo1']){
    $file = $_FILES['arquivo1'];
    $formatoArquivo = explode('.', $file['name'][0]);
    $rgverso = uniqid() . '.' . end($formatoArquivo);
    move_uploaded_file($file['tmp_name'][0], __DIR__ . '/fotos/' . $rgverso);
}

if ($_FILES['arquivo2']){
    $file = $_FILES['arquivo2'];
    $formatoArquivo = explode('.', $file['name'][0]);
    $cpf = uniqid() . '.' . end($formatoArquivo);
    move_uploaded_file($file['tmp_name'][0], __DIR__ . '/fotos/' . $cpf);
}

if ($_FILES['arquivo3']){
    $file = $_FILES['arquivo3'];
    $formatoArquivo = explode('.', $file['name'][0]);
    $compresidencia = uniqid() . '.' . end($formatoArquivo);
    move_uploaded_file($file['tmp_name'][0], __DIR__ . '/fotos/' . $compresidencia);
}

if ($_FILES['arquivo4']){
    $file = $_FILES['arquivo4'];
    $formatoArquivo = explode('.', $file['name'][0]);
    $cartao = uniqid() . '.' . end($formatoArquivo);
    move_uploaded_file($file['tmp_name'][0], __DIR__ . '/fotos/' . $cartao);
}

if ($_FILES['arquivo5']){
    $file = $_FILES['arquivo5'];
    $formatoArquivo = explode('.', $file['name'][0]);
    $outro = uniqid() . '.' . end($formatoArquivo);
    move_uploaded_file($file['tmp_name'][0], __DIR__ . '/fotos/' . $outro);
}

$sql = "INSERT INTO fotos (cpf_titular,rgfrente,rgverso,cpf,compresidencia,cartao, outro, forekey)
 VALUES ('$cpf_titular','$rgfrente', '$rgverso','$cpf', '$compresidencia','$cartao' ,'$outro', '$forekey')";

$sql2 = "UPDATE dadospessoais SET etapa = '4' where forekey = '{$forekey}'";
if($conexao->query($sql) === TRUE and $conexao->query($sql2) === TRUE) {
	$_SESSION['status_cadastro'] = true;
    echo "<script>window.location.assign('processa6?key=".$forekey."')</script>";
    exit;
}

$conexao->close();
?>