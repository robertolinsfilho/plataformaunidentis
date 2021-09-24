<?php
session_start();

include_once("conexao.php");

$cpf = $_GET['cpf'];


$x = mysqli_real_escape_string($conexao, trim($_POST['status']));
$rg = mysqli_real_escape_string($conexao, trim($_POST['rg']));
$expedidor = mysqli_real_escape_string($conexao, trim($_POST['expedidor']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$complemento = mysqli_real_escape_string($conexao, trim($_POST['complemento']));



$result_usuario7 = "SELECT * from dependentes where cpf_titular = '$cpf' and status != 'Implantadas'";
$resultado_usuario7 = mysqli_query($conexao, $result_usuario7);




if ($x === 'Alterar') {



  $sql1 = "UPDATE dadosprincipais SET rg='$rg', expedidor='$expedidor'  WHERE cpf='$cpf'";
  $sql2 = "UPDATE endereço SET cep='$cep', rua='$rua' ,numero='$numero', cidade='$cidade' ,estado='$estado', complemento='$complemento' WHERE cpf='$cpf' ";
  if ($conexao->query($sql2) === TRUE) {

    header('Location: form-wizard2.php?cpf=' . $cpf . '');
  } else {
    echo "Error updating record: " . $conexao->error;
  }
} else {

  $sql = "UPDATE dependentes SET status='$x' WHERE cpf_titular='$cpf' ";
  $sql1 = "UPDATE dadosprincipais SET rg='$rg', expedidor='$expedidor'  WHERE cpf='$cpf'";
  $sql2 = "UPDATE endereço SET cep='$cep', rua='$rua' ,numero='$numero', cidade='$cidade' ,estado='$estado', complemento='$complemento' WHERE cpf='$cpf' ";
}
if ($conexao->query($sql) === TRUE) {



  while ($row_usuario7 = mysqli_fetch_assoc($resultado_usuario7)) {


    $data1 = array(
      "token" => "rHFxpzIE8Ny86TNhgGzoybf93bcIopkXxqKdfShdgUbdpoALw0",
      "dados" => array(
        "incluirMensalidades" => "1",
        "parceiro" => array(
          "codigo" => 2
        ),
        "responsavelFinanceiro" => array(
          "codigo" => 22665314
        ),
        "dependente" => [
          array(
            "tipo" => 10,
            "nome" => "$row_usuario7[nome]",
            "dataNascimento" => "$row_usuario7[datas]",
            "cpf" => "$row_usuario7[cpf]",
            "sexo" => $row_usuario7['sexo'],
            "plano" => 13032,
            "planoValor" => "35",
            "nomeMae" => "$row_usuario7[mae]",
            "numeroProposta" => "1234321"
          )
        ],
        "contatoDependente" => [
          array(
            "tipo" => 1,
            "dado" => "$row_usuario7[nome]"
          )
        ]

      )
    );


    $payload1 = json_encode($data1);

    // Prepare new cURL resource
    $ch1 = curl_init('http://unidentis.s4e.com.br/SYS/services/vendedor.aspx/NovoDependente');
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch1, CURLOPT_POST, true);
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $payload1);

    // Set HTTP Header for POST request
    curl_setopt(
      $ch1,
      CURLOPT_HTTPHEADER,
      array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload1)
      )
    );

    // Submit the POST request
    $result1 = curl_exec($ch1);

    var_dump($result1);

    curl_close($ch1);
  }
}

header('Location: form-wizard2.php?cpf=' . $cpf . '');

$conexao->close();
