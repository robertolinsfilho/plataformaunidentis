<?php
session_start();
include_once('conexao.php');
require('./vendor/autoload.php');
    
use Encryption\Encryption;
use Encryption\Exception\EncryptionException;


$cpf = $_GET['cpf'];


$result_usuario = "SELECT * from dadospessoais where cpf = '$cpf'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

if($row_usuario['cpf_titular'] != $row_usuario['cpf'] ){
    $result_usuario6 = "SELECT * from responsavel where cpf = '$row_usuario[cpf_titular]'";
    $resultado_usuario6 = mysqli_query($conexao, $result_usuario6);
    $row_usuario6 = mysqli_fetch_assoc($resultado_usuario6);


}else{
    $result_usuario6 = "SELECT * from dadospessoais where cpf = '$cpf'";
    $resultado_usuario6 = mysqli_query($conexao, $result_usuario6);
    $row_usuario6 = mysqli_fetch_assoc($resultado_usuario6);

}



$result_usuario2 = "SELECT * from dadosprincipais where cpf = '$cpf'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);

$result_usuario3 = "SELECT * from endereco where cpf = '$cpf'";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);

$result_usuario4 = "SELECT * from contrato where cpf = '$cpf'";
$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);

$result_usuario5 = "SELECT * from contratocartao where cpf = '$cpf'";
$resultado_usuario5 = mysqli_query($conexao, $result_usuario5);
$row_usuario5 = mysqli_fetch_assoc($resultado_usuario5);

$result_usuario7 = "SELECT * from dependentes where cpf_titular = '$cpf' and status != 'Implantadas'";
$resultado_usuario7 = mysqli_query($conexao, $result_usuario7);


if($row_usuario4['cpf'] === $cpf){
    $result_usuario10 = "SELECT * from contrato where cpf = '$cpf'";
    $resultado_usuario10 = mysqli_query($conexao, $result_usuario10);
    $row_usuario10 = mysqli_fetch_assoc($resultado_usuario10);
}else{
    $result_usuario10 = "SELECT * from contratocartao where cpf = '$cpf'";
    $resultado_usuario10 = mysqli_query($conexao, $result_usuario10);
    $row_usuario10 = mysqli_fetch_assoc($resultado_usuario10);
}

$result_usuario11 = "SELECT * from vendedor where email = '$row_usuario[vendedor]'";
$resultado_usuario11 = mysqli_query($conexao, $result_usuario11);
$row_usuario11 = mysqli_fetch_assoc($resultado_usuario11);
$vendedor = substr($row_usuario11['vendedor'] , 0 ,5) ;

$cep = $row_usuario3['cep'];

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
  $result3= json_decode($result3, true);
  $result3 = $result3['dados'];

 
  $bairro = $result3['IdBairro'];
  $estado = $result3['IdUf'];
  $municipio = $result3['IdMunicipio'];
  $tipologradouro = $result3['IdTipoLogradouro'];

$bairro = intval($bairro);
 $estado = intval($estado) ;
 $municipio = intval($municipio);
 $tipologradouro = intval($tipologradouro);
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


if(isset($row_usuario5['cartao'])) {
    $cardNumer = $row_usuario5['cartao'];
    $brand = CreditCard::getBrandByCardNumber($cardNumer);
 


    $text = $row_usuario5['cartao'];
   
    $key = 'pxuelh2so839ljis';
    
    try {
    

        $encryption = Encryption::getEncryptionObject('AES-128-CBC');
        $iv = 'pxuelh2so839ljis';
        $encryptedText = $encryption->encrypt($text, $key, $iv);
        $decryptedText = $encryption->decrypt($encryptedText, $key, $iv);
       

    } catch (EncryptionException $e) {
        echo $e;
    }

$admissao = $row_usuario['admissao'];
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
    $row_usuario5['mes'] = '02/22';
    $row_usuario5['cvv'] = '123';
    $brand = '40';
    $row_usuario5['nomecartao']= 'teste';
    $admissao = $row_usuario['admissao'];
    
    if($admissao === '0000-00-00 00:00:00' ){
        $admissao = '2000-10-10 10:10:10';
    }
    if($row_usuario['local'] === 'GOVERNO DO ESTADO PB') {
        $codigo = 355;
        }elseif ($row_usuario['local'] === 'PREFEITURA MUNICIPAL DE CABEDELO'){
            $codigo = 333;
        }elseif($row_usuario['local'] === 'SEMOB'){
            $codigo = 69;
        }elseif ($row_usuario['local'] === 'EMLUR'){
            $codigo = 338;
        }elseif ($row_usuario['local'] === 'SECRETARIA DE SAUDE DO MUNICIPIO'){
            $codigo = 66;
        }elseif ($row_usuario['local'] === 'FUNDAC'){
            $codigo = 3766;
        }elseif ($row_usuario['local'] === 'PREFEITURA MUNICIPAL DE SANTA RITA'){
            $codigo = 342;
        }elseif ($row_usuario['plano'] === 'UNIDENTISVIPBOLETO' and $row_usuario4['boleto']  == 5){
            $codigo = 366;
        }elseif ($row_usuario['plano'] === 'UNIDENTISVIPBOLETO' and $row_usuario4['boleto']  == 10){
            $codigo = 367;
        }elseif ($row_usuario['plano'] === 'UNIDENTISVIPBOLETO' and $row_usuario4['boleto']  == 15){
            $codigo = 368;
        }elseif($row_usuario['plano'] === 'UNIDENTISVIPBOLETO' and $row_usuario4['boleto']  == 20){
            $codigo = 369;
        }elseif ($row_usuario['plano'] === 'UNIDENTISVIPBOLETO' and $row_usuario4['boleto']  == 25){
            $codigo = 370;
        }else{
            echo "erro 2";
            exit();
        }

}


if($row_usuario['plano'] === 'UNIDENTISVIPBOLETO' and $row_usuario['estado'] === 'PB'){
    $plano = 13032;
    $preco = $row_usuario4['preco'];
}elseif ($row_usuario['plano'] === 'UNIDENTISVIPCARTAO' and $row_usuario['estado'] === 'PB'){
    $plano = 13046;
    $preco = $row_usuario5['preco'];
}elseif ($row_usuario['plano'] === 'UNIDENTISVIPFAMILIACARTAO' and $row_usuario['estado'] === 'PB'){
    $plano = 13050;
    $preco = $row_usuario5['preco'];
}elseif($row_usuario['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' and $row_usuario['estado'] === 'PB') {
    $plano = 13051;
    $preco = $row_usuario5['preco'];
}elseif($row_usuario['plano'] === 'UNIDENTISVIPEMPRESARIAL'){
    $plano = 13034;
    $preco = $row_usuario4['preco'];
}elseif($row_usuario['estado'] === 'RN' and $row_usuario['plano'] === 'UNIDENTISVIPBOLETO'){
    $plano = 13058;
    $preco = $row_usuario4['preco'];

}elseif ($row_usuario['estado'] === 'RN' and $row_usuario['plano'] === 'UNIDENTISVIPCARTAO'){
    $plano = 13053;
    $preco = $row_usuario5['preco'];

}elseif ($row_usuario['estado'] === 'RN' and $row_usuario['plano'] === 'UNIDENTISVIPFAMILIACARTAO'){
    $plano = 13055;
    $preco = $row_usuario5['preco'];

}elseif ($row_usuario['estado'] === 'RN' and $row_usuario['plano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO'){
    $plano = 13056;
    $preco = $row_usuario5['preco'];


}elseif ($row_usuario['estado'] === ' RN' and $row_usuario['plano'] === 'UNIDENTISVIPEMPRESARIAL'){
    $plano = 13052;
    $preco = $row_usuario4['preco'];

}
else{
    echo 'erro no plano';
 

}




$data =   array(
    "token"=> "rHFxpzIE8Ny86TNhgGzoybf93bcIopkXxqKdfShdgUbdpoALw0",
    "dados"=>
            array( "incluirMensalidades"=> "0",
            "parceiro"=>
                array( "codigo"=> $vendedor,
                    "tipoCobranca"=> 1
                ),
    "responsavelFinanceiro"=> array(
       "codigoContrato"=> $codigo,
        "nome"=> "$row_usuario[nome]",
        "dataNascimento"=> "$row_usuario2[datas]",
        "cpf"=> "$row_usuario[cpf]",
        "matricula"=> "$row_usuario[matricula]",
        "dataApresentacao" => $admissao,
        "identidadeNumero"=> "$row_usuario2[rg]",
        "identidadeOrgaoExpeditor"=> "$row_usuario2[expedidor]",
        "sexo"=> $row_usuario2['sexo'],
        "enderecoBoleto"=> "$row_usuario3[rua]",


        "endereco"=>array(
        "cep"=> "$row_usuario3[cep]",
        "tipoLogradouro"=> $tipologradouro,
        "logradouro"=> "$row_usuario3[rua]",
        "numero"=> $row_usuario3['numero'],
        "complemento"=> "$row_usuario3[complemento]",
        "bairro"=> $bairro,
        "municipio"=> $municipio,
        "uf"=> $estado,


          ),
            "contatoResponsavelFinanceiro"=> [ array(
                 "tipo"=> 8,
                 "dado"=> "$row_usuario[celular]"
                 ),
                array(
                "tipo"=> 50,
                 "dado"=> "$row_usuario[email]"
                        
                ) 
            ],


                             "cartao"=> array(
                             "numero"=> "$encryptedText",
                             "validade"=> "$row_usuario5[mes]",
                             "codSeguranca"=> "$row_usuario5[cvv]",
                             "bandeira"=> "$brand",
                             "diaVencimentoCartao"=> "1",
                             "nomeImpressoCartao"=> "$row_usuario5[nomecartao]"
                          )
                            ),

                               "dependente"=> [

                                   array(
                                   "tipo"=> 1,
                                   "nome"=> "$row_usuario6[nome]",
                                   "dataNascimento"=> "$row_usuario6[nascimento]",
                                   "cpf"=> "$row_usuario6[cpf]",
                                   "sexo"=> $row_usuario6['sexo'],
                                   "plano"=> $plano,
                                   "planoValor"=> "$preco",
                                   "nomeMae"=> "$row_usuario6[mae]",
                                   "numeroCarteira"=> "",
                                   "cns" => "$row_usuario6[sus]",
                                   "MMYYYY1Pagamento" => $row_usuario['1pag'],
                                  
                               ),
                             
                            ],
                            
                                          )
                                          );
                                         
                                        
                                         
                                        
$payload = json_encode($data);

// Prepare new cURL resource
$ch= curl_init('http://unidentis.s4e.com.br/SYS/services/vendedor.aspx/NovoUsuario');
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
$result = $result['dados'];


while($row_usuario7 = mysqli_fetch_assoc($resultado_usuario7)){



$data1 =   array(
    "token"=> "rHFxpzIE8Ny86TNhgGzoybf93bcIopkXxqKdfShdgUbdpoALw0",
    "dados"=> array(
            "incluirMensalidades"=> "1",
            "parceiro"=> array(
            "codigo"=>  $vendedor
            ),
		"responsavelFinanceiro"=> array(
           "codigo"=> $result['codigo']
        ),
		"dependente"=>[
			array(
                "tipo"=> $row_usuario7['parentesco'],
				"nome"=> "$row_usuario7[nome]",
				"dataNascimento"=> "$row_usuario7[datas]",
				"cpf"=> "$row_usuario7[cpf]",
				"sexo"=> $row_usuario7['sexo'],
				"plano"=> $plano,
				"planoValor"=> "$row_usuario10[preco]",
				"nomeMae"=> "$row_usuario7[mae]",
				"numeroProposta"=> "1",
                "cns" => "$row_usuario7[cns]"
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


echo $cpf;
if($num == '1') {
    $sql1 = "UPDATE dadospessoais SET status='Implantadas' WHERE cpf='$cpf' ";
    $conexao->query($sql1);
    
    if ($num2 == '1') {
       
        $sql2 = "UPDATE dependentes SET status='Implantadas' WHERE cpf_titular='$cpf'";
        $conexao->query($sql2);

          header('Location: processa5.php?email='.$row_usuario['email']);

    }else{
        header('Location: processa5.php?email='.$row_usuario['email']);
    }
}else{
    echo 'erro';
}





?>