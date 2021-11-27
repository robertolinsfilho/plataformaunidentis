<?php 
include_once('conexao.php');
session_start();

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
print_r($post);
$id = $post['id'];


try {
    $conectar = new PDO('mysql:host=' . HOST . ';dbname=' . DB, USUARIO, SENHA, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    print "<b>Error!</b> " . $e->getMessage() . "<br/>";
    die();
}

$sql = "UPDATE `dependentes` SET cpf = ?, parentesco = ?, sexo = ?, nome = ?, cns = ?, estadocivil = ?, datas = ?, mae = ?";
$sql = $conectar->prepare($sql . " WHERE id ='$id'");

if($sql->execute(array($post['cpf'],
                $post['parentesco'], 
                $post['sexo'], 
                $post['nome'], 
                $post['cns'], 
                $post['estadocivil'], 
                $post['datas'], 
                $post['mae']
                ))){
                    header('Location: dependentes3');
                    exit;
                } else {
                    header('Location: dependentes3#erro');
                }
?>