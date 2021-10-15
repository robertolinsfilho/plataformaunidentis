<?php
include "conexao.php";
session_start();
include_once('conexao.php');


$usuario = $_SESSION['usuario'];
$tipocliente = $_SESSION['cliente'];
$nome = $_SESSION['nome'];
$cpf = $_SESSION['cpf'];

$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);

$email = $_SESSION['email'];
$fixo = $_SESSION['fixo'];
$telefone = $_SESSION['telefone'];
$sexo = $_SESSION['sexo'];
$rg = $_SESSION['rg'];
$nascimento = $_SESSION['nascimento'];
$mae = $_SESSION['mae'];
$estado = $_SESSION['estado'];
$sus = $_SESSION['sus'];
$cep = $_SESSION['cep'];
$rua = $_SESSION['rua'];
$numero = $_SESSION['numero'];
$uf = $_SESSION['uf'];
$complemento = $_SESSION['complemento'];
$cidade = $_SESSION['cidade'];
$bairro = $_SESSION['bairro'];
$plano = $_SESSION['plano'];
$emissor = $_SESSION['emissor'];
$admissao = $_SESSION['admissao'];
$matricula = $_SESSION['matricula'];
$responsavel = $_SESSION['cpftitular1'];
echo $_SESSION['cpftitular1'];
echo $cpf;
if (empty($_SESSION['cpftitular1'])) {
    $cpftitular = $cpf;
    echo 'entrou1';
} elseif ($_SESSION['cpftitular1'] != $cpf && isset($_SESSION['cpftitular1'])) {
    $cpftitular = $_SESSION['cpftitular1'];
    echo 'entrou2';
} else {
    echo 'entrou3';
    $cpftitular = $cpf;
}
$date = date('Ym');

$sql = "INSERT INTO  dadospessoais (nome,email,cpf,vendedor,celular,estado,plano,status,tipocliente,admissao,matricula,sus,mae,nascimento,sexo, pessoa, local, cpf_titular,etapa,1pag,preco,corretora) 
VALUES ('$nome', '$email', '$cpf','$usuario','$telefone','$_SESSION[escolha]','$plano','Nova', '$tipocliente','$admissao','$matricula','$sus','$mae','$nascimento','$_SESSION[nascimento]','$_SESSION[cliente]', '$_SESSION[escolha]','$cpftitular','6','$date','$_SESSION[precototal]','$_SESSION[corretora]')";
$sql2 = "INSERT INTO  dadosprincipais (nome,email,cpf,celular,sexo,whats,rg,estadocivil,datas,expedidor,mae, fixo) 
VALUES ('$nome', '$email', '$cpf','$telefone','$sexo','$fixo', '$rg','$estado','$nascimento','$emissor','$mae','$fixo')";

$sql3 = "INSERT INTO  endereco (cpf,cep,rua,numero,bairro,cidade,estado,complemento) 
VALUES ( '$cpf','$cep','$rua','$numero', '$bairro','$cidade','$uf','$complemento')";

$sql4 = "INSERT INTO  usuario (usuario, senha) VALUES ('$email', '$_SESSION[senhaemail]')";
$_SESSION['msg1'] = '<h4 style="font-size: 1.5rem; line-height: 2rem">Sua proposta foi cadastrada! <br> <p style="margin-top: 1rem; margin-bottom: .75rem;font-size:1rem; line-height: 1.25rem;">Enviamos um email ao Responsável Financeiro, com as instruções para pagamento.</p><p style="margin-bottom: .25rem;font-size:1rem; line-height: 1.25rem;">Esta proposta permanecerá em "NOVAS" até que o cliente a conclua no e-mail recebido.</p></h4>';
if ($conexao->query($sql) === TRUE and $conexao->query($sql2) === true and $conexao->query($sql3) === TRUE and $conexao->query($sql4) === TRUE) {


    if (isset($responsavel)) {

        $sql5 = "INSERT INTO  responsavel  (nome,cpf,nascimento,estado,sexo,mae,sus ) 
        VALUES ('$_SESSION[nometitular]','$_SESSION[cpftitular1]','$_SESSION[nascimentotitular]','$_SESSION[estadotitular]','$_SESSION[sexotitular]','$_SESSION[maetitular]','$_SESSION[sustitular]')";
        $conexao->query($sql5);
        header('Location: modalfinal');
    } else {
        echo "Error updating record: " . $conexao->error;
        header('Location: modalfinal');
    }

    header('Location: modalfinal');
} else {
    echo "Error updating record: " . $conexao->error;
}
