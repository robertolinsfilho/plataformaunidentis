<?php
session_start();
include_once("conexao.php");
$result_usuario = "SELECT * from dadospessoais where cpf ='$_SESSION[cpf]'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);



echo $_SESSION['sexo'] = mysqli_real_escape_string($conexao, trim($_POST['sexo']));
echo  $_SESSION['whats'] = mysqli_real_escape_string($conexao, trim($_POST['whats']));
echo  $_SESSION['rg'] = mysqli_real_escape_string($conexao, trim($_POST['rg']));
 echo $_SESSION['estadocivil'] = mysqli_real_escape_string($conexao, trim($_POST['estadocivil']));
 echo $_SESSION['datas'] = mysqli_real_escape_string($conexao, trim($_POST['datas']));
 echo $_SESSION['expedidor'] = mysqli_real_escape_string($conexao, trim($_POST['expedidor']));
echo  $_SESSION['mae'] = mysqli_real_escape_string($conexao, trim($_POST['mae']));
echo  $_SESSION['fixo'] = mysqli_real_escape_string($conexao, trim($_POST['fixo']));


$sql ="UPDATE dadospessoais set mae = '$_SESSION[mae]', nascimento = '$_SESSION[datas]', sexo = '$_SESSION[sexo]' , local = '$_SESSION[estado1]', cpf_titular = '$_SESSION[cpf]', etapa = '3' where  cpf = '$_SESSION[cpf]'  ";

$sql2 = "INSERT INTO dadosprincipais (cpf,celular,sexo,whats,rg,estadocivil,datas,expedidor,mae)
VALUES ( '$_SESSION[cpf]','$_SESSION[whats]','$_SESSION[sexo]','$_SESSION[whats]','$_SESSION[rg]','$_SESSION[estadocivil]','$_SESSION[datas]','$_SESSION[expedidor]','$_SESSION[mae]')";
if($conexao->query($sql) === TRUE and $conexao->query($sql2) === TRUE){
    
   if($row_usuario['plano']=='UNIDENTISVIPBOLETO'){
       header('Location: formenviofotos#form1');
    }elseif($row_usuario['plano']=='UNIDENTISVIPEMPRESARIAL'){
        header('Location: formendereco?#form1');
    }else{
        header('Location: formenviofotoscartao?#form1');
    }

}else{
    echo 'entrou0';
    echo $conexao->$sql->Log::error('message');
}

exit;
?>