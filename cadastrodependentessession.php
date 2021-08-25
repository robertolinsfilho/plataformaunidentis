
<?php
include_once('conexao.php');
session_start();

$data_atual = date("Y");

$parentesco = mysqli_real_escape_string($conexao, trim($_POST['parentesco']));
$cpfdependente = mysqli_real_escape_string($conexao, trim($_POST['cpfdependente']));
$datadependente = mysqli_real_escape_string($conexao, trim($_POST['datadependente']));
$data = substr($datadependente, 6);
$nomedependente = mysqli_real_escape_string($conexao, trim($_POST['nomedependente']));
$estadodependente = mysqli_real_escape_string($conexao, trim($_POST['estadodependente']));
$sexodependente = mysqli_real_escape_string($conexao, trim($_POST['sexodependentes']));
$maedependente = mysqli_real_escape_string($conexao, trim($_POST['maedependente']));
$cnsdependente = mysqli_real_escape_string($conexao, trim($_POST['cnsdependente']));
$_SESSION['parentesco'] = $parentesco;
$cpf = $_SESSION['cpf'];
$cpfdependente = str_replace(".", "", $cpfdependente);
$cpfdependente = str_replace("-", "", $cpfdependente);
$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);


$data1 = $data_atual - $data;
 if($data1 > 17 && empty($cpfdependente)){
    ?>
 <html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#myModal').modal('show');
        });
    </script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>


<body class="text-center">
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Unidentis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h5 style='font-weight: 600; color: #606060;'>Dependente maior de 18 anos, por favor inserir CPF</h5>
            </div>
            <div class="modal-footer">
                <a href="cadastrodependentes" type="button" class="btn btn-secondary" >Fechar</a>

            </div>
        </div>
    </div>
</div>

</body>


</html>

    <?php
 }else{
$sql = "INSERT INTO  dependentes (cpf_titular,nome,cpf,datas,cns,estadocivil,sexo,mae,parentesco) 
VALUES ('$cpf', '$nomedependente', '$cpfdependente','$datadependente','$cnsdependente','$estadodependente','$sexodependente', '$maedependente','$parentesco')";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
    header('Location: cadastrodependentes');
}


$conexao->close();
 }
?>