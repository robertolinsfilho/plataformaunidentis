<?php
session_start();
include("conexao.php");




session_start();

$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    $arquivo10 = $_FILES['arquivo10'];
    for ($cont = 0; $cont < count($arquivo10['name']); $cont++) {
        $nome = strtolower(str_replace(" ","",uniqid().$arquivo10['name'][$cont]));
        $destino10 = "./fotos/$nome";

        if (move_uploaded_file($arquivo10['tmp_name'][$cont], $destino10)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";
            header("Location: index3.php");
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
         
            echo $destino;
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
    header("Location: index.php");
}
$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    $arquivo2 = $_FILES['arquivo1'];
    for ($cont = 0; $cont < count($arquivo2['name']); $cont++) {
        $nome2 = strtolower(str_replace(" ","",uniqid().$arquivo2['name'][$cont]));
        $destino2 = "./fotos/$nome2";

        if (move_uploaded_file($arquivo2['tmp_name'][$cont], $destino2)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";
            header("Location: index3.php");
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
            echo $destino;
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
    header("Location: index.php");
}

$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    $arquivo3 = $_FILES['arquivo2'];
    for ($cont = 0; $cont < count($arquivo3['name']); $cont++) {
        $nome3 = strtolower(str_replace(" ","",uniqid().$arquivo3['name'][$cont]));
        $destino3 = "./fotos/$nome3";

        if (move_uploaded_file($arquivo3['tmp_name'][$cont], $destino3)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";
            header("Location: index3.php");
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
            echo $destino;
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
    header("Location: index.php");
}


$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    $arquivo4 = $_FILES['arquivo3'];
 
    for ($cont = 0; $cont < count($arquivo4['name']); $cont++) {
        $nome4 = strtolower(str_replace(" ","",uniqid().$arquivo4['name'][$cont]));
        $destino4 = "./fotos/$nome4";

        if (move_uploaded_file($arquivo4['tmp_name'][$cont], $destino4)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";
            header("Location: index3.php");
            
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
            echo $destino;
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
    header("Location: index.php");
}



$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    $arquivo5 = $_FILES['arquivo4'];
 
    for ($cont = 0; $cont < count($arquivo5['name']); $cont++) {
        $nome5 = strtolower(str_replace(" ","",uniqid().$arquivo5['name'][$cont]));
        $destino5 = "./fotos/$nome5";

        if (move_uploaded_file($arquivo5['tmp_name'][$cont], $destino5)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";
            header("Location: resumo");
            
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
            echo $destino;
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
    header("Location: index.php");
}

$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    $arquivo6 = $_FILES['arquivo5'];
 
    for ($cont = 0; $cont < count($arquivo6['name']); $cont++) {
        $nome6 = strtolower(str_replace(" ","",uniqid().$arquivo6['name'][$cont]));
        $destino6 = "./fotos/$nome6";

        if (move_uploaded_file($arquivo6['tmp_name'][$cont], $destino6)) {
            $_SESSION['msg'] = "<p style='color:green;'>Upload realizado com sucesso</p>";
            header("Location: resumo");
            
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
            echo $destino;
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar upload</p>";
    header("Location: index.php");
}


 $cpf = $_SESSION['cpf'];

$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);



$sql = "INSERT INTO fotos (cpf_titular,rgfrente,rgverso,cpf,compresidencia,cartao,outro)
 VALUES ('$cpf','$nome', '$nome2','$nome3', '$nome4','$nome5','$nome6')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
	
}

$conexao->close();



?>