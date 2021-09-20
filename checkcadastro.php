<?php
include_once "conexao.php";
session_start();
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);


$result_usuario = "SELECT * from contratocartao where cpf = '$cpf'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$result_usuario1 = "SELECT * from contratocartao where cpf = '$cpf'";
$resultado_usuario1 = mysqli_query($conexao, $result_usuario1);
$row_usuario1 = mysqli_fetch_assoc($resultado_usuario1);
$result_usuario3 = "SELECT * from dadospessoais where status = 'Implantadas'";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);
$result_usuario4 = "SELECT * from dadospessoais where cpf= $cpf and status != 'Cancelado'";
$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);

$result_usuario5 = "SELECT * from dadospessoais where email= '$_SESSION[email]' and status != 'Cancelado'";
$resultado_usuario5 = mysqli_query($conexao, $result_usuario5);
$row_usuario5 = mysqli_fetch_assoc($resultado_usuario5);


$url = "http://unidentis.s4e.com.br/v2/api/associados?token=RWNTF7PUC87KRYRTVNFGP8XNYWJ4DQC4XWCGSHPW2F9FCURP82&cpfAssociado=$cpf";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($curl), true);
$resultado = $resultado['dados'];
$x = 0;

foreach ($resultado as $value) {

    foreach ($value['dependentes'] as $value1) {

        foreach ((array)$value1['nomeSituacao'] as $value2) {


            if ($value2 != 'CANCELADO') {
                $x = 1;
            }
        }
    }
}





if ($x == 1 or isset($row_usuario4['cpf']) or isset($row_usuario5['email'])) {


?>
    <html>

    <head>
        <style>
            .modal-header {
                background-color: #284ebf;
                color: white;
                font-family: Poppins;
                /* border-radius: 21px 21px 0px 0px; */
            }

            .modal-title {
                color: white;
            }

            /* .modal-content{
			border-radius:21px;
			background-color:#f6f6f6;
		} */
        </style>
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

    <body class="text-center">
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">UNIDENTIS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 style="color:#606060;font-weight:bold;text-align: center;"> CPF ou Email já está vinculado a um plano</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="cadastrogeral" type="button" class="btn btn-secondary">Fechar</a>

                    </div>
                </div>
            </div>
        </div>
    </body>
    <html>


<?php

} else {


    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $fixo = mysqli_real_escape_string($conexao, trim($_POST['fixo']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $sexo = mysqli_real_escape_string($conexao, trim($_POST['sexo']));
    $rg = mysqli_real_escape_string($conexao, trim($_POST['rg']));
    $mae = mysqli_real_escape_string($conexao, trim($_POST['mae']));
    $estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
    $sus = mysqli_real_escape_string($conexao, trim($_POST['sus']));
    $cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
    $rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
    $numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
    $complemento = mysqli_real_escape_string($conexao, trim($_POST['complemento']));
    $uf = mysqli_real_escape_string($conexao, trim($_POST['uf']));
    $cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
    $bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
    $plano = mysqli_real_escape_string($conexao, trim($_POST['plano']));
    $nascimento = mysqli_real_escape_string($conexao, trim($_POST['nascimento']));
    $emissor = mysqli_real_escape_string($conexao, trim($_POST['emissor']));
    $emissor = mysqli_real_escape_string($conexao, trim($_POST['emissor']));
    $nometitular = mysqli_real_escape_string($conexao, trim($_POST['nometitular']));
    $cpftitular = mysqli_real_escape_string($conexao, trim($_POST['cpftitular']));
    $nascimentotitular = mysqli_real_escape_string($conexao, trim($_POST['nascimentotitular']));
    $estadotitular = mysqli_real_escape_string($conexao, trim($_POST['estadotitular']));
    $sexotitular = mysqli_real_escape_string($conexao, trim($_POST['sexotitular']));
    $maetitular = mysqli_real_escape_string($conexao, trim($_POST['maetitular']));
    $sustitular = mysqli_real_escape_string($conexao, trim($_POST['sustitular']));



if (isset($cpf)) {
    $arquivo10 = $_FILES['arquivo10'];
    for ($cont = 0; $cont < count($arquivo10['name']); $cont++) {
        $destino10 = "./fotos/" . $arquivo10['name'][$cont];
        if (move_uploaded_file($arquivo10['tmp_name'][$cont], $destino10)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";         
            $nome9 = $arquivo10['name'][$cont];
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";         
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";   
}

if (isset($cpf)) {
    $arquivo2 = $_FILES['arquivo1'];
    for ($cont = 0; $cont < count($arquivo2['name']); $cont++) {
        $destino2 = "./fotos/" . $arquivo2['name'][$cont];        
        if (move_uploaded_file($arquivo2['tmp_name'][$cont], $destino2)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";           
            $nome2 = $arquivo2['name'][$cont];
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";            
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";    
}


if (isset($cpf)) {
    $arquivo3 = $_FILES['arquivo2'];
    for ($cont = 0; $cont < count($arquivo3['name']); $cont++) {
        $destino3 = "./fotos/" . $arquivo3['name'][$cont];
        if (move_uploaded_file($arquivo3['tmp_name'][$cont], $destino3)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";          
            $nome3 = $arquivo3['name'][$cont];
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
            echo $destino;
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";  
}



if (isset($cpf)) {
    $arquivo4 = $_FILES['arquivo3'];
 
    for ($cont = 0; $cont < count($arquivo4['name']); $cont++) {
        $destino4 = "./fotos/" . $arquivo4['name'][$cont];
        if (move_uploaded_file($arquivo4['tmp_name'][$cont], $destino4)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";           
            $nome4 = $arquivo4['name'][$cont];            
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";            
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";    
}



if (isset($cpf)) {
    $arquivo5 = $_FILES['arquivo4'];
 
    for ($cont = 0; $cont < count($arquivo5['name']); $cont++) {
        $destino5 = "./fotos/" . $arquivo5['name'][$cont];
        if (move_uploaded_file($arquivo5['tmp_name'][$cont], $destino5)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";          
            $nome5 = $arquivo5['name'][$cont];            
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";           
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";    
}

if (isset($cpf)) {
    $arquivo6 = $_FILES['arquivo5'];
 
    for ($cont = 0; $cont < count($arquivo6['name']); $cont++) {
        $destino6 = "./fotos/" . $arquivo6['name'][$cont];
        if (move_uploaded_file($arquivo6['tmp_name'][$cont], $destino6)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";           
            $nome6 = $arquivo6['name'][$cont];            
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";            
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
   
}


 


$sql = "INSERT INTO fotos (cpf_titular,rgfrente,rgverso,cpf,compresidencia,cartao, outro)
 VALUES ('$cpf','$nome9', '$nome2','$nome3', '$nome4','$nome5' ,'$nome6')";
$sql2 = "UPDATE dadospessoais SET etapa = '4' where cpf = $cpf";
if($conexao->query($sql) === TRUE and $conexao->query($sql2) === TRUE) {
	$_SESSION['status_cadastro'] = true;
	
}

}
