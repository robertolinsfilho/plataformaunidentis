<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Digital</title>
    <style>
    #preloader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    overflow: visible;
    background: #fff;
  }
  
  #preloader:before {
    content: "";
    position: fixed;
    top: calc(50% - 30px);
    left: calc(50% - 30px);
    border: .5rem solid #023bbf;
    border-top-color: #e2eefd;
    border-radius: 50%;
    width: 64px;
    height: 64px;
    -webkit-animation: animate-preloader 1s linear infinite;
    animation: animate-preloader 1s linear infinite;
  }
  
  @-webkit-keyframes animate-preloader {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
  
  @keyframes animate-preloader {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
    </style>
</head>
<body>
    <div id="preloader" class="pre-loader"></div>
</body>
</html>
<?php
session_start();
include_once('conexao.php');
require('./vendor/autoload.php');
    
use Encryption\Encryption;
use Encryption\Exceptions\EncryptionException as EncException;

$cpf = $_GET['cpf'];

// LISTAR OS DADOS GERAIS DO ASSOCIADO
$queryDadosGeraisAssociado = mysqli_query($conexao, "SELECT * from dadospessoais where cpf ='$cpf'");
$dadosGeraisAssociado = mysqli_fetch_assoc($queryDadosGeraisAssociado);

// VERIFICAR SE O ASSOCIADO É O TITULAR
if ($dadosGeraisAssociado['cpf_titular'] != $dadosGeraisAssociado['cpf']) {
	// LISTAR OS DADOS PRINCIPAIS DO TITULAR DESTE PLANO
	$queryDadosTitular = mysqli_query($conexao, "SELECT * from responsavel where cpf ='$dadosGeraisAssociado[cpf_titular]'");
	$dadosTitular = mysqli_fetch_assoc($queryDadosTitular);
} else {
	// ASSOCIADO TITULAR DO PLANO || LISTAR OS DADOS PRINCIPAIS DO TITULAR DESTE PLANO
	$queryDadosTitular = mysqli_query($conexao, "SELECT * from dadospessoais where cpf ='$cpf'");
	$dadosTitular = mysqli_fetch_assoc($queryDadosTitular);
}

// PEGA O CPF DO TITULAR DO PLANO
$cpf_titular = $dadosTitular['cpf'];

// LISTA OS DADOS PRINCIPAIS DO ASSOCIADO
$queryDadosPrincipaisAssociado = mysqli_query($conexao, "SELECT * from dadosprincipais  where cpf  = '$cpf'");
$dadosPrincipaisAssociado = mysqli_fetch_assoc($queryDadosPrincipaisAssociado);

// LISTA OS DADOS DO ENDERECO QUE ESTA AMARRADO AO ASSOCIADO PELA CHAVE ESTRANGEIRA 'CPF'
$queryDadosEnderecoAssociado = mysqli_query($conexao, "SELECT * from endereco  where cpf  = '$cpf'");
$dadosEnderecoAssociado = mysqli_fetch_assoc($queryDadosEnderecoAssociado);

// LISTA OS DADOS DO ANTIGO CONTRATO BOLETO, JÁ EM DESUSO
$queryDadosBoleto = mysqli_query($conexao, "SELECT * from contrato where cpf  = '$cpf'");
$dadosBoleto = mysqli_fetch_assoc($queryDadosBoleto);

// LISTA OS DADOS DO CONTRATO CARTAO DE CREDITO
$queryDadosCartao = mysqli_query($conexao, "SELECT * from contratocartao  where cpf  = '$cpf'");
$dadosCartao = mysqli_fetch_assoc($queryDadosCartao);

// REALIZA A CONEXAO COM A TABELA DEPENDENTES PARA SER LISTADA LÁ NA FRENTE COM 'WHILE' 
$queryDadosDependentes = mysqli_query($conexao, "SELECT * from dependentes  where cpf_titular  = '$cpf_titular'");

// LISTA OS DADOS DO VENDEDOR
$queryDadosVendedor = mysqli_query($conexao, "SELECT * from vendedor where email = '$dadosGeraisAssociado[vendedor]'");
$dadosVendedor = mysqli_fetch_assoc($queryDadosVendedor);

// REPETIÇÃO
// if($dadosBoleto['cpf'] === $cpf){
//     $result_usuario10 = "SELECT * from contrato where cpf = '$cpf'";
//     $resultado_usuario10 = mysqli_query($conexao, $result_usuario10);
//     $row_usuario10 = mysqli_fetch_assoc($resultado_usuario10);
// }else{
//     $result_usuario10 = "SELECT * from contratocartao where cpf = '$cpf'";
//     $resultado_usuario10 = mysqli_query($conexao, $result_usuario10);
//     $row_usuario10 = mysqli_fetch_assoc($resultado_usuario10);
// }
// REPETIÇÃO

$vendedor = substr($dadosVendedor['vendedor'] , 0 ,5) ;

$cep = $dadosEnderecoAssociado['cep'];

$cep = str_replace("-", "", $cep);

$data = array(
    'token' => 'rHFxpzIE8Ny86TNhgGzoybf93bcIopkXxqKdfShdgUbdpoALw0',
    'cep'=> $cep
    
  );

  $payload = json_encode($data);

// Prepare new cURL resource
  $ch= curl_init('http://unidentis.s4e.com.br/SYS/services/vendedor.aspx/Endereco');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLINFO_HEADER_OUT, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

  // Set HTTP Header for POST request 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($payload))
    );

  // Submit the POST request
    $result3 = curl_exec($ch);
 
    $result3 = utf8_encode($result3);
    $result3 = json_decode($result3, true);
    $result3 = $result3['dados'];

    $bairro         = intval($result3['IdBairro']);
    $estado         = intval($result3['IdUf']);
    $municipio      = intval($result3['IdMunicipio']);
    $tipologradouro = intval($result3['IdTipoLogradouro']);

    curl_close($ch);
  

class CreditCard
{
    const AMERICAN_EXPRESS = '38';
    const DINERS_CLUB = '41';
    const ELO = '60';
    const HIPERCARD = '40';
    const MASTERCARD = '39';
    const VISA = '42';

 
    private $brands = [
        self::AMERICAN_EXPRESS => '/^3[47]\d{13}$/',
        self::DINERS_CLUB => '^3(?:0[0-5]|[68][0-9])[0-9]{11}$^',
        self::ELO => ' ^4011(78|79)|^43(1274|8935)|^45(1416|7393|763(1|2))|^504175|^627780|^63(6297|6368|6369)|(65003[5-9]|65004[0-9]|65005[01])|(65040[5-9]|6504[1-3][0-9])|(65048[5-9]|65049[0-9]|6505[0-2][0-9]|65053[0-8])|(65054[1-9]|6505[5-8][0-9]|65059[0-8])|(65070[0-9]|65071[0-8])|(65072[0-7])|(65090[1-9]|6509[1-6][0-9]|65097[0-8])|(65165[2-9]|6516[67][0-9])|(65500[0-9]|65501[0-9])|(65502[1-9]|6550[34][0-9]|65505[0-8])|^(506699|5067[0-6][0-9]|50677[0-8])|^(509[0-8][0-9]{2}|5099[0-8][0-9]|50999[0-9])|^65003[1-3]|^(65003[5-9]|65004\d|65005[0-1])|^(65040[5-9]|6504[1-3]\d)|^(65048[5-9]|65049\d|6505[0-2]\d|65053[0-8])|^(65054[1-9]|6505[5-8]\d|65059[0-8])|^(65070\d|65071[0-8])|^65072[0-7]|^(65090[1-9]|65091\d|650920)|^(65165[2-9]|6516[6-7]\d)|^(65500\d|65501\d)|^(65502[1-9]|6550[3-4]\d|65505[0-8])^',
        self::HIPERCARD => '^606282^','637095^', '637599^','637568^',
        self::MASTERCARD => '^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$^',
        self::VISA => '/^4[0-9]\d+$/',
    ];

 
    public static function getBrandByCardNumber(int $number)
    {
        return (new CreditCard)->verifyBrand($number);
    }

    private function verifyBrand(int $number): string
    {
        switch ($number) {
            case $this->getBrandPattern($this::AMERICAN_EXPRESS, $number):
                return $this::AMERICAN_EXPRESS;
            case $this->getBrandPattern($this::DINERS_CLUB, $number):
                return $this::DINERS_CLUB;
            case $this->getBrandPattern($this::ELO, $number):
                return $this::ELO;
            case $this->getBrandPattern($this::HIPERCARD, $number):
                return $this::HIPERCARD;
            case $this->getBrandPattern($this::MASTERCARD, $number):
                return $this::MASTERCARD;
            case $this->getBrandPattern($this::VISA, $number):
                return $this::VISA;
            default:
                return 'is_invalid';
                exit();
        }
    }

    private function getBrandPattern(string $pattern, int $number): bool
    {
        return preg_match($this->brands[$pattern], $number) > 0;
    }
}

if(isset($dadosCartao['cartao'])) {
    $cardNumer = intval($dadosCartao['cartao']);
    $brand     = CreditCard::getBrandByCardNumber($cardNumer);
    $text      = $dadosCartao['cartao'];
    $key       = 'pxuelh2so839ljis';
    try {
        $encryption = Encryption::getEncryptionObject('AES-128-CBC');
        $iv = 'pxuelh2so839ljis';
        $encryptedText = $encryption->encrypt($text, $key, $iv);
        $decryptedText = $encryption->decrypt($encryptedText, $key, $iv);
    } catch (EncException $e) {
        echo $e;
    }

$admissao = $dadosGeraisAssociado['admissao'];
    $admissao = '2000-10-10 10:10:10';

    if ($brand == 39) {
        $codigo = 4269;
    } elseif ($brand == 40) {
        $codigo = 4271;
    } elseif ($brand == 42) {
        $codigo = 4267;
    } elseif ($brand == 60) {
        $codigo = 4276;
    }

}else{
    $encryptedText = 'CoJM86MwX0U3SveT7bc1EYDlRJsw+iTw/Z/urjmcZQk=';
    $dadosCartao['mes'] = '02/22';
    $dadosCartao['cvv'] = '123';
    $brand = '40';
    $dadosCartao['nomecartao']= 'teste';
    $admissao = $dadosGeraisAssociado['admissao'];
    
    if($admissao === '0000-00-00 00:00:00' ){
        $admissao = '2000-10-10 10:10:10';
    }
    if($dadosGeraisAssociado['local'] === 'GOVERNO DO ESTADO PB') {
        $codigo = 355;
        }elseif ($dadosGeraisAssociado['local'] === 'PREFEITURA MUNICIPAL DE CABEDELO'){
            $codigo = 333;
        }elseif($dadosGeraisAssociado['local'] === 'SEMOB'){
            $codigo = 69;
        }elseif ($dadosGeraisAssociado['local'] === 'EMLUR'){
            $codigo = 338;
        }elseif ($dadosGeraisAssociado['local'] === 'SECRETARIA DE SAUDE DO MUNICIPIO'){
            $codigo = 66;
        }elseif ($dadosGeraisAssociado['local'] === 'FUNDAC'){
            $codigo = 3766;
        }elseif ($dadosGeraisAssociado['local'] === 'PREFEITURA MUNICIPAL DE SANTA RITA'){
            $codigo = 342;
        }elseif ($dadosGeraisAssociado['plano'] === 'UNIDENTISVIPBOLETO' and $dadosBoleto['boleto']  == 5){
            $codigo = 366;
        }elseif ($dadosGeraisAssociado['plano'] === 'UNIDENTISVIPBOLETO' and $dadosBoleto['boleto']  == 10){
            $codigo = 367;
        }elseif ($dadosGeraisAssociado['plano'] === 'UNIDENTISVIPBOLETO' and $dadosBoleto['boleto']  == 15){
            $codigo = 368;
        }elseif($dadosGeraisAssociado['plano'] === 'UNIDENTISVIPBOLETO' and $dadosBoleto['boleto']  == 20){
            $codigo = 369;
        }elseif ($dadosGeraisAssociado['plano'] === 'UNIDENTISVIPBOLETO' and $dadosBoleto['boleto']  == 25){
            $codigo = 370;
        }else{
            echo "erro 2";
            exit();
        }
}

// 13040

if($dadosGeraisAssociado['plano'] === 'UNIDENTISVIPBOLETO' and $dadosGeraisAssociado['estado'] === 'PB'){
    $plano = 13032;
    $preco = $dadosBoleto['preco'];
}elseif ($dadosGeraisAssociado['plano'] === 'UNIDENTISVIPCARTAO' and $dadosGeraisAssociado['estado'] === 'PB'){
    $plano = 13046;
    $preco = $dadosCartao['preco'];
}elseif ($dadosGeraisAssociado['plano'] === 'UNIDENTISVIPFAMILIACARTAO' and $dadosGeraisAssociado['estado'] === 'PB'){
    $plano = 13050;
    $preco = $dadosCartao['preco'];
}elseif($dadosGeraisAssociado['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' and $dadosGeraisAssociado['estado'] === 'PB') {
    $plano = 13051;
    $preco = $dadosCartao['preco'];
}elseif($dadosGeraisAssociado['plano'] === 'PLANOVIPORTOCARTAO'){
    $plano = 13040;
    $preco = $dadosCartao['preco'];
}elseif($dadosGeraisAssociado['plano'] === 'UNIDENTISVIPEMPRESARIAL'){
    $plano = 13034;
    $preco = $dadosBoleto['preco'];
}elseif($dadosGeraisAssociado['estado'] === 'RN' and $dadosGeraisAssociado['plano'] === 'UNIDENTISVIPBOLETO'){
    $plano = 13058;
    $preco = $dadosBoleto['preco'];

}elseif ($dadosGeraisAssociado['estado'] === 'RN' and $dadosGeraisAssociado['plano'] === 'UNIDENTISVIPCARTAO'){
    $plano = 13053;
    $preco = $dadosCartao['preco'];

}elseif ($dadosGeraisAssociado['estado'] === 'RN' and $dadosGeraisAssociado['plano'] === 'UNIDENTISVIPFAMILIACARTAO'){
    $plano = 13055;
    $preco = $dadosCartao['preco'];

}elseif ($dadosGeraisAssociado['estado'] === 'RN' and $dadosGeraisAssociado['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO'){
    $plano = 13056;
    $preco = $dadosCartao['preco'];


}elseif ($dadosGeraisAssociado['estado'] === ' RN' and $dadosGeraisAssociado['plano'] === 'UNIDENTISVIPEMPRESARIAL'){
    $plano = 13052;
    $preco = $dadosBoleto['preco'];

}
else{
    echo 'erro no plano';
}

$data =   array(
    "token"=> "rHFxpzIE8Ny86TNhgGzoybf93bcIopkXxqKdfShdgUbdpoALw0",
    "dados"=> array(
    "incluirMensalidades"=> "0",
    "parceiro"=> array( 
            "codigo"=> $vendedor,
            "tipoCobranca"=> 1
        ),
        "responsavelFinanceiro"=> array(
            "codigoContrato"           => $codigo,
            "nome"                     => "$dadosGeraisAssociado[nome]",
            "dataNascimento"           => "$dadosPrincipaisAssociado[datas]",
            "cpf"                      => "$dadosGeraisAssociado[cpf]",
            "matricula"                => "$dadosGeraisAssociado[matricula]",
            "dataApresentacao"         => $admissao,
            "identidadeNumero"         => "$dadosPrincipaisAssociado[rg]",
            "identidadeOrgaoExpeditor" => "$dadosPrincipaisAssociado[expedidor]",
            "sexo"                     => $dadosPrincipaisAssociado['sexo'],
            "enderecoBoleto"           => "$dadosEnderecoAssociado[rua]",
                "endereco"       => array(
                    "cep"            => "$dadosEnderecoAssociado[cep]",
                    "tipoLogradouro" => $tipologradouro,
                    "logradouro"     => "$dadosEnderecoAssociado[rua]",
                    "numero"         => $dadosEnderecoAssociado['numero'],
                    "complemento"    => "$dadosEnderecoAssociado[complemento]",
                    "bairro"         => $bairro,
                    "municipio"      => $municipio,
                    "uf"             => $estado,
                ),
                    "contatoResponsavelFinanceiro"=> [ 
                        array(
                        "tipo"=> 8,
                        "dado"=> "$dadosGeraisAssociado[celular]"
                        ),
                        array(
                        "tipo"=> 50,
                        "dado"=> "$dadosGeraisAssociado[email]"
                                
                        ) 
                    ],
                             "cartao"=> array(
                             "numero"              => "$encryptedText",
                             "validade"            => "$dadosCartao[mes]",
                             "codSeguranca"        => "$dadosCartao[cvv]",
                             "bandeira"            => "$brand",
                             "diaVencimentoCartao" => "1",
                             "nomeImpressoCartao"  => "$dadosCartao[nomecartao]"
                          )
        ),

        "dependente"=> [
            array(
            "tipo"             => 1,
            "nome"             => "$dadosTitular[nome]",
            "dataNascimento"   => "$dadosTitular[nascimento]",
            "cpf"              => "$dadosTitular[cpf]",
            "sexo"             => $dadosTitular['sexo'],
            "plano"            => $plano,
            "planoValor"       => "$preco",
            "nomeMae"          => "$dadosTitular[mae]",
            "numeroCarteira"   => "",
            "cns"              => "$dadosTitular[sus]",
            "MMYYYY1Pagamento" => $dadosGeraisAssociado['1pag'],
            
            ),
        
        ],
                            
    )
);
                                                                         
$payload = json_encode($data);

// Prepare new cURL resource
$ch = curl_init('http://unidentis.s4e.com.br/SYS/services/vendedor.aspx/NovoUsuario');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set HTTP Header for POST request
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload))
);

// Submit the POST request
$result = curl_exec($ch);

$num = $result[10];
$result = utf8_encode($result);

$result= json_decode($result, true);

curl_close($ch);
$dados = $result['dados'];


/** FINALIZADO ENVIO DE ASSOCIADO **/

// ENVIO DE DEPENDENTES
while($dadosDependentes = mysqli_fetch_assoc($queryDadosDependentes)){

$data1 =   array(
    "token"=> "rHFxpzIE8Ny86TNhgGzoybf93bcIopkXxqKdfShdgUbdpoALw0",
    "dados"=> array(
            "incluirMensalidades"=> "1",
            "parceiro"=> array(
            "codigo"=>  $vendedor
            ),
		"responsavelFinanceiro"=> array(
           "codigo"=> $dados['codigo']
        ),
		"dependente"=>[
			array(
                "tipo"           => $dadosDependentes['parentesco'],
                "nome"           => "$dadosDependentes[nome]",
                "dataNascimento" => "$dadosDependentes[datas]",
                "cpf"            => "$dadosDependentes[cpf]",
                "sexo"           => $dadosDependentes['sexo'],
                "plano"          => $plano,
                "planoValor"     => "$dadosCartao[preco]",
                "nomeMae"        => "$dadosDependentes[mae]",
                "numeroProposta" => $dados['codigo'] ,
                "cns"            => "$dadosDependentes[cns]"
            )
		],
		"contatoDependente"=> [
				
			]
    )
);

$payload1 = json_encode($data1);

// Prepare new cURL resource
$ch1= curl_init('http://unidentis.s4e.com.br/SYS/services/vendedor.aspx/NovoDependente');
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLINFO_HEADER_OUT, true);
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $payload1);

// Set HTTP Header for POST request
curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload1))
);

// Submit the POST request
$result1 = curl_exec($ch1);

$num2 = $result1[10];

$result1 = utf8_encode($result1);
$result1= json_decode($result1, true);

curl_close($ch1);

}

if($num == '1') {
    //  $sql1 = "UPDATE dadospessoais SET status='Implantadas' WHERE cpf='$cpf' ";
    //  $conexao->query($sql1);
    if ($num2 == '1') {
        // $sql2 = "UPDATE dependentes SET status='Implantadas' WHERE cpf_titular='$cpf'";
        // $conexao->query($sql2);
        // header('Location: processa5.php?email='.$dadosGeraisAssociado['email']);
    }else{
        // header('Location: processa5.php?email='.$dadosGeraisAssociado['email']);
    }
}else {
    $_SESSION['erroS4'] = $result['mensagem'];
    echo "<body onload='window.history.back();'>";
    exit;
}
?>


