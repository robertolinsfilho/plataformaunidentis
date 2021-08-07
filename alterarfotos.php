<?php
session_start();
include_once ("conexao.php");


$nome1 = $_GET['nome'];
$cpf = $_GET['cpf'];

session_start();

$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    $arquivo10 = $_FILES['arquivo10'];
    for ($cont = 0; $cont < count($arquivo10['name']); $cont++) {

        $destino10 = "./fotos/" . $arquivo10['name'][$cont];

        if (move_uploaded_file($arquivo10['tmp_name'][$cont], $destino10)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";
           //header("Location: formwizard.php?cpf=".$cpf);
            $nome = $arquivo10['name'][$cont];
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
         
            echo $destino;
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
    header("Location: index.php");
}
echo $nome;

$sql ="UPDATE fotos SET $nome1 = '$nome' where cpf_titular = $cpf";
if($conexao->query($sql) === TRUE){
    header("Location: form-wizard.php?cpf=".$cpf);
}else{
    echo $conexao->$sql->Log::error('message');
}
?>