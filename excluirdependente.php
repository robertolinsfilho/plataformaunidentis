<?php 
include_once('conexao.php');
session_start();


$id = mysqli_real_escape_string ($conexao, $_GET['id']);







$sql = "DELETE FROM `dependentes` WHERE id ='$id'";

if($conexao->query($sql) ===TRUE){
    header('Location: dependentes3');

}else{
   $conexao->$sql->Log::error('message');
}
?>