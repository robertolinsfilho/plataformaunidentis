<?php
session_start();
include_once("conexao.php");

$forekey = $_GET['key'];
$preco      = $_SESSION['preco'];
$cpf        = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$nome       = mysqli_real_escape_string($conexao, trim($_POST['nomecartao']));
$email      = mysqli_real_escape_string($conexao, trim($_POST['email']));
$cpfcartao  = mysqli_real_escape_string($conexao, trim($_POST['cpfcartao']));
$nomecartao = mysqli_real_escape_string($conexao, trim($_POST['nomecartao']));
$cartao     = mysqli_real_escape_string($conexao, trim($_POST['cartao']));
$mes        = mysqli_real_escape_string($conexao, trim($_POST['mes']));
$cvv        = mysqli_real_escape_string($conexao, trim($_POST['cvv']));

$_SESSION['mesano']     = $mes;
$_SESSION['nomecartao'] = $nome;
$cartao                 = str_replace(' ', '', $cartao);

$cpf = str_replace("-", "", str_replace(".", "", $cpf));
$cpfcartao = str_replace("-", "", str_replace(".", "", $cpfcartao));

function luhnCheck($cartao)
{
    $str = '';
    foreach (array_reverse(str_split($cartao)) as $i => $c) $str .= ($i % 2 ? $c * 2 : $c);
    return array_sum(str_split($str)) % 10 == 0;
}
if (luhnCheck($cartao) != TRUE) {
    $_SESSION['cartaoInvalido'] = true;
    echo "<body onload='window.history.back();'>";
    exit();
}

if($cpf != $cpfcartao){
    $_SESSION['cpfDiferente'] = true;
    echo "<body onload='window.history.back();'>";
    exit;
}else{
    $_SESSION['cpfDiferente'] = false;
}
class CreditCard
{
    const AMERICAN_EXPRESS = '38';
    const DINERS_CLUB = '41';
    const ELO = '60';
    const HIPERCARD = '40';
    const MASTERCARD = '39';
    const VISA = '42';

    /**
     * @var array
     */
    private $brands = [
        self::AMERICAN_EXPRESS => '/^3[47]\d{13}$/',
        self::DINERS_CLUB => '^3(?:0[0-5]|[68][0-9])[0-9]{11}$^',
        self::ELO => ' ^4011(78|79)|^43(1274|8935)|^45(1416|7393|763(1|2))|^504175|^627780|^63(6297|6368|6369)|(65003[5-9]|65004[0-9]|65005[01])|(65040[5-9]|6504[1-3][0-9])|(65048[5-9]|65049[0-9]|6505[0-2][0-9]|65053[0-8])|(65054[1-9]|6505[5-8][0-9]|65059[0-8])|(65070[0-9]|65071[0-8])|(65072[0-7])|(65090[1-9]|6509[1-6][0-9]|65097[0-8])|(65165[2-9]|6516[67][0-9])|(65500[0-9]|65501[0-9])|(65502[1-9]|6550[34][0-9]|65505[0-8])|^(506699|5067[0-6][0-9]|50677[0-8])|^(509[0-8][0-9]{2}|5099[0-8][0-9]|50999[0-9])|^65003[1-3]|^(65003[5-9]|65004\d|65005[0-1])|^(65040[5-9]|6504[1-3]\d)|^(65048[5-9]|65049\d|6505[0-2]\d|65053[0-8])|^(65054[1-9]|6505[5-8]\d|65059[0-8])|^(65070\d|65071[0-8])|^65072[0-7]|^(65090[1-9]|65091\d|650920)|^(65165[2-9]|6516[6-7]\d)|^(65500\d|65501\d)|^(65502[1-9]|6550[3-4]\d|65505[0-8])^',
        self::HIPERCARD => '^606282^', '637095^', '637599^', '637568^',
        self::MASTERCARD => '^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$^',
        self::VISA => '/^4[0-9]\d+$/',
    ];

    /**
     * @param int $number
     * @return mixed
     */
    public static function getBrandByCardNumber(int $number)
    {
        return (new CreditCard)->verifyBrand($number);
    }

    /**
     * @param int $number
     * @return string
     */
    private function verifyBrand(int $number): string
    {
        switch ($number) {
            case $this->getBrandPattern($this::AMERICAN_EXPRESS, $number):
                return $this::AMERICAN_EXPRESS;
                break;
            case $this->getBrandPattern($this::DINERS_CLUB, $number):
                return $this::DINERS_CLUB;
                break;
            case $this->getBrandPattern($this::ELO, $number):
                return $this::ELO;
                break;
            case $this->getBrandPattern($this::HIPERCARD, $number):
                return $this::HIPERCARD;
                break;
            case $this->getBrandPattern($this::MASTERCARD, $number):
                return $this::MASTERCARD;
                break;
            case $this->getBrandPattern($this::VISA, $number):
                return $this::VISA;
                break;
            default:
                $_SESSION['cartaoInvalido'] = true;
                echo "<body onload='window.history.back();'>";
                exit;
                break;

        }
    }

    /**
     * @param string $pattern
     * @param int $number
     * @return bool
     */
    private function getBrandPattern(string $pattern, int $number): bool
    {
        return preg_match($this->brands[$pattern], $number) > 0;
    }
}
$brand = CreditCard::getBrandByCardNumber($cartao);
if ($brand == 38 or $brand == 41) {
    ?>
    <html>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#myModal').modal('show');
            });
        </script>
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>

    <body>

        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Unidentis</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 style="text-align: center">Bandeira do Cartão Inválida</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="areacliente" class="btn btn-secondary" type="button">fechar</a>

                    </div>
                </div>
            </div>
        </div>

    </body>

</html>

<?php
    $_SESSION['cpfDiferente'] = false;
    exit;
}

$sql = "INSERT INTO  contratocartao (cpf,nome,email,nomecartao,cartao,mes,cvv,preco,forekey) 
VALUES ('$cpf','$nome','$email','$nomecartao','$cartao','$mes','$cvv','$preco', '$forekey')";

$sql2 = "UPDATE dadospessoais SET ativo = 1 where forekey = '$forekey'";

$sql3 = "UPDATE dadospessoais SET status = 'Pag Pendente' WHERE forekey = '$forekey'";

if ($conexao->query($sql) === TRUE and $conexao->query($sql2) === TRUE and $conexao->query($sql3) === TRUE) {
    $_SESSION['status_cadastro'] = 'Plano';
    header('Location: planocadastrado');
}

$conexao->close();


?>