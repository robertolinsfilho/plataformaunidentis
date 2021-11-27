<?php
session_start();
include_once('conexao.php');

$hotel = mysqli_real_escape_string($conexao, trim($_POST['fabricante']));
$acomodacao = mysqli_real_escape_string($conexao, trim($_POST['produtos']));

if($hotel == 1){
    $hotel = 'pessoafisica';
}else{
    $hotel = 'servidorpublico';
}
$_SESSION['cliente'] = $hotel;

$_SESSION['escolha'] = $acomodacao;

header('Location: dadospessoais');

?>