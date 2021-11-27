<?php
session_start();
include_once('../conexao.php');
require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$nome = $_SESSION['nome'];
$cpf = $_SESSION['cpf'];
$email = $_SESSION['email'];
$fixo = $_SESSION['fixo'];
$celular = $_SESSION['telefone'];
$rg = $_SESSION['rg'];
$emissor = $_SESSION['emissor'];
$sex = $_SESSION['sexo'];
$sus = $_SESSION['sus'];
$cep = $_SESSION['cep'];
$endereco = $_SESSION['rua'];
$numero = $_SESSION['numero'];
$uf = $_SESSION['uf'];
$bairro = $_SESSION['bairro'];
$complemento = $_SESSION['complemento'];
$municipio = $_SESSION['cidade']; 
$forekey = $_SESSION['forekey'];

$queryDadosAssociados = mysqli_query($conexao, "SELECT COUNT(*) from dadospessoais");
$dadosAssociados = mysqli_fetch_assoc($queryDadosAssociados);
$queryDadosDependentes = mysqli_query($conexao, "SELECT * from dependentes  where forekey ='$forekey'");

// beneficiários
$tipo = 'TITULAR';
$countDep = $_SESSION['countDep'];

// info plano
$registro = '455.913/07-4';
$plano = $_SESSION['plano'];

// preco
$precoPlano = $_SESSION['precoPlano'];
$precoTotal = $_SESSION['precoTotal'];

switch ($sex) {
    case '1':
        $sexo = 'masculino';
        break;
    case '0':
        $sexo = 'feminino';
        break;
        
}

$part1 = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>PDF</title>
    <style>
        *{
          font-family: "Poppins", sans-serif;
        }
        div.center{
            width: 100%;
            text-align: center;
        }
      div.rounded-border {
        text-align: center;
        border: 3px solid blue;
        border-radius: 25px;
        padding: 0;
        height: 40px;
        margin-top: 10px;
        margin-bottom: 10px;
      }
      div.rounded-border h4 {
        font-size: 16px;
        line-height: 6px;
      }
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      td {
        border: none;
        text-align: left;
        padding: 2px 0;
        width: 200px;
      }

      p {
        padding-left: 16px;
        padding-right: 16px;
        font-size: 15px;
        line-height: 6px;
        color: blue;
        margin-bottom: .5rem;
      }
      span {
        padding-left: 16px;
        padding-right: 16px;
        display: block;
        font-size: 16px;
        line-height: 16px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="left">
        <img src="./logo.PNG" alt="logo" width="150" />
      </div>
      <div class="center">
        <h3>Resumo de Nº'.$dadosAssociados["COUNT(*)"].'</h3>
      </div>
      <div class="rounded-border">
        <h4>Responsável Financeiro</h4>
      </div>
      <table>
        <tr>
          <td>
            <p>Nome:</p>
            <span>'.$nome.'</span>
          </td>
          <td>
            <p>CPF:</p>
            <span>'.$cpf.'</span>
          </td>
          <td>
            <p>E-MAIL:</p>
            <span>'.$email.'</span>
          </td>
        </tr>
        <tr>
          <td>
            <p>Tel. Fixo:</p>
            <span>'.$fixo.'</span>
          </td>
          <td>
            <p>Celular:</p>
            <span>'.$celular.'</span>
          </td>
          <td>
            <p>RG:</p>
            <span>'.$rg.'</span>
          </td>
        </tr>
        <tr>
          <td>
            <p>Org. Emissor:</p>
            <span>'.$emissor.'</span>
          </td>
          <td>
            <p>Sexo:</p>
            <span>'.$sexo.'</span>
          </td>
          <td>
            <p>Cartão do SUS:</p>
            <span>'.$sus.'</span>
          </td>
        </tr>
        <tr>
          <td>
            <p>CEP:</p>
            <span>'.$cep.'</span>
          </td>
          <td>
            <p>Endereço:</p>
            <span>'.$endereco.'</span>
          </td>
          <td>
            <p>Número:</p>
            <span>'.$numero.'</span>
          </td>
          
        </tr>
        <tr>
          <td>
            <p>Bairro:</p>
            <span>'.$bairro.'</span>
          </td>
          <td>
            <p>UF:</p>
            <span>'.$uf.'</span>
          </td>
          <td>
            <p>Complemento:</p>
            <span>'.$complemento.'</span>
          </td>
        </tr>
        <tr>
          <td>
            <p>Município:</p>
            <span>'.$municipio.'</span>
          </td>
          
        </tr>
      </table>
      <div class="rounded-border">
        <h4>Beneficiários</h4>
      </div>
      <table>
        <tr>
          <td>
            <p>Tipo:</p>
            <span>'.$tipo.'</span>
          </td>
          <td>
            <p>Nome:</p>
            <span>'.$nome.'</span>
          </td>
        </tr>
        ';

$part2 = '
</table>
<div class="rounded-border">
  <h4>Informações do Plano</h4>
</div>
<table>
  <tr>
    <td>
      <p>Registro:</p>
      <span>'.$registro.'</span>
    </td>
    <td>
      <p>Plano:</p>
      <span>'.$plano.'</span>
    </td>
  </tr>
</table>
<div class="rounded-border">
  <h4>Valor Total</h4>
</div>
<table>
  <tr>
    <td><p>Valor por Beneficiário:</p></td>
    <td><span style="text-align: right;">R$ '.$precoPlano.'</span></td>
  </tr>
  <tr>
    <td><p>Total:</p></td>
    <td><span style="text-align: right;">R$ '.$precoTotal.'</span></td>
  </tr>
</table>
</div>
</body>
</html>
';
while ($dadosDependentes = mysqli_fetch_assoc($queryDadosDependentes)){
    $part1 .= '<tr>
        <td>
            <p>Tipo:</p>
            <span>DEPENDENTE</span>
        </td>
        <td>
            <p>Nome:</p>
            <span>'.$dadosDependentes["nome"].'</span>
        </td>
    </tr>';
};
// INSTÂNCIA DE OPTIONS
$options = new Options();
$options->setChroot(__DIR__);

// INSTÂNCIA DE DOMPDF
$dompdf = new Dompdf($options);
$dompdf->loadHtml($part1 . $part2);

// RENDERIZAR O ARQUIVO PDF
$dompdf->render();

header('Content-Type: application/pdf');
echo $dompdf->output();