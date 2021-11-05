<?php
session_start();
include('../conexao.php');
$_SESSION['usuario'];

$input = file_get_contents("php://input");
$array = json_decode($input, true);
$dia = $array['dia'];

$doGrafico = array();

for($i = 0; $i < $dia; $i++){
    $data = date('Y-m-d', strtotime('-' . $i .'days'));
    // LISTAR OS DADOS GERAIS DO ASSOCIADO
    $queryDadosGrafico = mysqli_query($conexao, "SELECT COUNT(*) as contador FROM dadospessoais WHERE `vendedor` ='{$_SESSION['usuario']}' AND `data` LIKE '$data%'");
    $dadosGrafico = mysqli_fetch_assoc($queryDadosGrafico);
    $doGrafico += array(date('d/m', strtotime($data)) => $dadosGrafico['contador']);
}

$jsonDoGrafico = json_encode($doGrafico);
echo $jsonDoGrafico;
mysqli_close($conexao);