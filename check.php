<?php
session_start();
$_SESSION['ruadependente']     = null;
$_SESSION['bairrodependente']  = null;
$_SESSION['cepdependente']     = null;
$_SESSION['ufdependente']      = null;
$_SESSION['numerodependente']  = null;
$_SESSION['nomedependente']    = null;
$_SESSION['nomeCpf']           = null;
$_SESSION['nomeplano']         = null;
$_SESSION['celulardependente'] = null;
$_SESSION['emaildependente']   = null;

//Criar a conexao

$cpf = $_POST['cpf'];
// $cpf = '07407603430';
$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);
$_SESSION['cpf'] = $cpf;
/* check connection */
$url = "http://unidentis.s4e.com.br/v2/api/associados?token=RWNTF7PUC87KRYRTVNFGP8XNYWJ4DQC4XWCGSHPW2F9FCURP82&limite=50&cpfAssociado=$cpf";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($curl), true);
$resultado = $resultado['dados'];
$cpfExist = false;

foreach ((array)$resultado as $value) {
  foreach ((array)$value['dependentes'] as $value1) {

    if ((int)$value1['codigoSituacao'] == 1 && (string)$value1['grauParentescoNome'] == "TITULAR") {

      $contatos = array_values((array)$value['contatos']);

      foreach ($contatos as $contato) {
        if ((string)$contato["tipo"] == "Fixo" or (string)$contato["tipo"] == "Celular") {
          if (strlen((string)$contato['descricaoContato']) == 11) {
            $_SESSION['celulardependente'] = $contato['descricaoContato'];
          }
        }

        $_SESSION['emaildependente'] = null;
        if ((string)$contato["tipo"] == "E-mail") {
          $_SESSION['emaildependente'] = (string)$contato['descricaoContato'];
        }
      }

      $_SESSION['ruadependente']    = $value['logradouro'];
      $_SESSION['bairrodependente'] = $value['bairro'];
      $_SESSION['cepdependente']    = $value['cep'];
      $_SESSION['ufdependente']     = $value['ufSigla'];
      
      if(isset($value['numero'])) $_SESSION['numerodependente'] = $value['numero'];

      $_SESSION['nomedependente'] = $value1['nomeDependente'];
      $_SESSION['nomeCpf'] = $value['nome'];
      $_SESSION['nomeplano'] = $value1['nomePlano'];
      // if ($_SESSION['nomeplano'] == 'UNIDENTIS VIP CARTÃO') {
      //   $_SESSION['nomeplano'] == 'UNIDENTIS VIP CARTAO';
      // }

      $cpfIsSet = true;
    }
  }
}

$_SESSION['forekey'] = md5(strtotime("last Sunday").strtotime("now"));

// foreach ($resultado as $value) {
//   foreach ($value['dependentes'] as $value1) {

//     foreach ((array)$value['contatos'] as $value2) {

//       if ($value1['nomeSituacao'] == 'ATIVO') {
//         if ($value2['tipo'] == 'Celular' or $value2['tipo'] == 'Fixo' ) {
//           $_SESSION['celulardependente'] = $value2['descricaoContato'];
//           $y = 1;
//         }
//         if ($value2['tipo'] == 'E-mail') {
//           $_SESSION['emaildependente'] = $value2['descricaoContato'];
//           $z = 1;
//         }
//       }
//     }
//   }
// }

// if ($value1['nomePlano'] == 'UNIDENTIS VIP EMPRESARIAL') {
//   echo $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
//   Plano Empresa
// </div>";
//   // header('Location: incluirdependentes');
//   exit;
// }

if (!$cpfIsSet) {
  echo $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
  CPF Inexistente
</div>";
  header('Location: incluirdependentes');
  exit;
} else {
  header('Location: incluirformtitular#centro');
  exit;
}
