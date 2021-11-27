<?php
session_start();
include('../conexao.php');
$_SESSION['usuario'];

$status = $_GET['status'];

$input = file_get_contents("php://input");
$array = json_decode($input, true);
$dia = $array['dia'];

$doGrafico = array();
if ($status == 'Novas') :
    // LISTAR OS DADOS GERAIS DO ASSOCIADO
    for ($i = 0; $i < $dia; $i++) {
        $data = date('Y-m-d', strtotime('-' . $i . 'days'));

        $queryDadosGrafico = mysqli_query($conexao, "SELECT COUNT(*) as contador FROM dadospessoais WHERE `status` = 'Nova' AND `vendedor` ='{$_SESSION['usuario']}' AND `data` LIKE '$data%'");
        $dadosGrafico = mysqli_fetch_assoc($queryDadosGrafico);
        $doGrafico += array(date('d/m', strtotime($data)) => $dadosGrafico['contador']);
    }
elseif ($status == 'PagPendente') :
    for ($i = 0; $i < $dia; $i++) {
        $data = date('Y-m-d', strtotime('-' . $i . 'days'));
        // LISTAR OS DADOS GERAIS DO ASSOCIADO
        $queryDadosGrafico = mysqli_query($conexao, "SELECT COUNT(*) as contador FROM dadospessoais WHERE `status` = 'Pag Pendente' AND `vendedor` ='{$_SESSION['usuario']}' AND `data` LIKE '$data%'");
        $dadosGrafico = mysqli_fetch_assoc($queryDadosGrafico);
        $doGrafico += array(date('d/m', strtotime($data)) => $dadosGrafico['contador']);
    }
elseif ($status == 'EmAnalise') :
    for ($i = 0; $i < $dia; $i++) {
        $data = date('Y-m-d', strtotime('-' . $i . 'days'));
        // LISTAR OS DADOS GERAIS DO ASSOCIADO
        $queryDadosGrafico = mysqli_query($conexao, "SELECT COUNT(*) as contador FROM dadospessoais WHERE `status` = 'Em Analise' AND `vendedor` ='{$_SESSION['usuario']}' AND `data` LIKE '$data%'");
        $dadosGrafico = mysqli_fetch_assoc($queryDadosGrafico);
        $doGrafico += array(date('d/m', strtotime($data)) => $dadosGrafico['contador']);
    }
elseif ($status == 'Canceladas') :
    for ($i = 0; $i < $dia; $i++) {
        $data = date('Y-m-d', strtotime('-' . $i . 'days'));
        // LISTAR OS DADOS GERAIS DO ASSOCIADO
        $queryDadosGrafico = mysqli_query($conexao, "SELECT COUNT(*) as contador FROM dadospessoais WHERE `status` = 'Cancelado' AND `vendedor` ='{$_SESSION['usuario']}' AND `data` LIKE '$data%'");
        $dadosGrafico = mysqli_fetch_assoc($queryDadosGrafico);
        $doGrafico += array(date('d/m', strtotime($data)) => $dadosGrafico['contador']);
    }
elseif ($status == 'Implantadas') :
    for ($i = 0; $i < $dia; $i++) {
        $data = date('Y-m-d', strtotime('-' . $i . 'days'));
        // LISTAR OS DADOS GERAIS DO ASSOCIADO
        $queryDadosGrafico = mysqli_query($conexao, "SELECT COUNT(*) as contador FROM dadospessoais WHERE `status` = 'Implantadas' AND `vendedor` ='{$_SESSION['usuario']}' AND `data` LIKE '$data%'");
        $dadosGrafico = mysqli_fetch_assoc($queryDadosGrafico);
        $doGrafico += array(date('d/m', strtotime($data)) => $dadosGrafico['contador']);
    }
elseif ($status == 'Indeferido') :
    for ($i = 0; $i < $dia; $i++) {
        $data = date('Y-m-d', strtotime('-' . $i . 'days'));
        // LISTAR OS DADOS GERAIS DO ASSOCIADO
        $queryDadosGrafico = mysqli_query($conexao, "SELECT COUNT(*) as contador FROM dadospessoais WHERE `status` = 'Indeferido' AND `vendedor` ='{$_SESSION['usuario']}' AND `data` LIKE '$data%'");
        $dadosGrafico = mysqli_fetch_assoc($queryDadosGrafico);
        $doGrafico += array(date('d/m', strtotime($data)) => $dadosGrafico['contador']);
    }
endif;

$jsonDoGrafico = json_encode($doGrafico);
echo $jsonDoGrafico;
mysqli_close($conexao);
