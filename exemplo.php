<?php 
session_start();
include_once('conexao.php');
require_once 'vendor/autoload.php';
error_reporting(0);

$result_usuario2 = "SELECT * from dadospessoais where email = '{$_SESSION['emailplataforma']}' ";
  $resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
  $row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
$cpf = $row_usuario2['cpf'];
$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);
if($row_usuario2['cpf_titular'] != $row_usuario2['cpf'] ){
  $result_usuario3 = "SELECT * from responsavel where cpf = '$row_usuario2[cpf_titular]' ";
  $resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
  $row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);
}else{
  $result_usuario3 = "SELECT * from dadospessoais where email = '{$_SESSION['emailplataforma']}'  ";
  $resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
  $row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);
}


$result_usuario4 = "SELECT * from dadosprincipais where email = '{$_SESSION['emailplataforma']}' ";
$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);
$result_usuario5 = "SELECT * from endereco where cpf = '$row_usuario2[cpf]' ";
$resultado_usuario5 = mysqli_query($conexao, $result_usuario5);
$row_usuario5 = mysqli_fetch_assoc($resultado_usuario5);

?>
<html>
<style>
    
    .col{
        display: inline-block;
        padding: 8px;
    }
    h4{
        font-size: 18px;
    }
    form{
        width: 100%;
        text-align: left;
        margin-left: 2%;
       
    }
   
    table,td{
       
        width: 100%;
        text-align: center;
        font-size: 20px;
    }
    td{
      border: 1px solid black;
    }
    th{
      color:blue
    }
    label{
        color: blue;
    }
    
</style>   

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <h1 style="text-align: center;color: blue;"> RESUMO DA PROPOSTA </h1>
    <br>
    <h1 style="text-align: center; height: 40px; width: 100%;border: 25px;border-color: black;background-color:blue;border-radius: 5px;color: white;">Responsavel Financeiro</h1>
<br> 
                       
<table style="width:100%">
           
<tr>
    <th>Nome</th>
    <th>CPF</th>
    <th>RG:</th>
   
    

  </tr>

  <tr>
    <td><?php echo  $row_usuario3['nome']?></td>
    <td><?php echo $row_usuario3['cpf']?></td>
    <td><?php echo $row_usuario4['rg']?></td>
 
   
  </tr>
</table>    

  <table>
    <tr>
    <th>NASCIMENTO:</th>
    <th>ESTADO CIVIL:</th>
    <th>NOME DA MÃE:</th>
    </tr>

    <tr>
    <td><?php echo $row_usuario2['nascimento']?></td>
    <td><?php echo $row_usuario4['estadocivil']?></td>
    <td><?php echo $row_usuario4['mae']?> </td>
    </tr>
  </table>   

  <table>
    <tr>
   
    <th>TELEFONE:</th>
    <th>RG:</th>
    <th>E-MAIL:</th>
    <th>CNS:</th>
    </tr>

    <tr>
   
    <td><?php echo $row_usuario2['celular']?></td>
    <td><?php echo $row_usuario4['rg']?></td>
    <td><?php echo $row_usuario2['email']?></td>
    <td><?php echo $row_usuario3['sus']?></td>
    </tr>

    </table>  

    
    
    <h1 style="text-align: center; height: 40px; width: 100%;border: 25px;border-color: black;background-color:blue;border-radius: 5px;color: white;">Endereço</h1>
    <br>
    
           <table>
           <tr>
           <th>CEP:</th>
           <th>LOGRADOURO:</th>
           <th>NÚMERO:</th>
           <th>COMPLEMENTO:</th>
           </tr>
           <tr>
           <td><?php echo $row_usuario5['cep']?></td>
           <td><?php echo $row_usuario5['rua']?></td>
           <td><?php echo $row_usuario5['numero']?></td>
           <td><?php echo $row_usuario5['complemento']?></td>
           </tr>
           
           </table>
                
              


  
    <h1 style="text-align: center; height: 40px; width: 100%;border: 25px;border-color: black;background-color:blue;border-radius: 5px;color: white;">Titular</h1>
   
    <table>
           <tr>
           <th>NOME</th>
           <th>CPF:</th>
           <th>NASCIMENTO:</th>  
           </tr>
           <tr>
           <td><?php echo $row_usuario2['nome']?></td>
           <td><?php echo $row_usuario2['cpf']?></td>
           <td><?php echo $row_usuario4['datas']?></td>           
           </tr>
           
           </table>
           <table>
           <tr>
           <th>ESTADO CIVIL:</th>
       
           <th>NOME DA MÃE:</th>  
           </tr>
           <tr>
           <td><?php echo $row_usuario4['estadocivil']?></td>
           <td><?php echo $row_usuario4['mae']?></td>
                   
           </tr>
           
           </table>
                
                
               
                
              
             
    <h1 style="text-align: center; height: 40px; width: 100%;border: 25px;border-color: black;background-color:blue;border-radius: 5px;color: white;">Informações do Plano</h1>
    <br> 
    
    <table>
           <tr>
           <th>NOME</th>
           <th>CPF:</th>
           <th>NASCIMENTO:</th>  
           </tr>
           <tr>
           <td><?php echo $row_usuario2['nome']?></td>
           <td><?php echo $row_usuario2['cpf']?></td>
           <td><?php echo $row_usuario4['datas']?></td>           
           </tr>
           
           </table>
           <table>
           <tr>
           <th>ESTADO CIVIL:</th>
       
           <th>NOME DA MÃE:</th>  
           </tr>
           <tr>
           <td><?php echo $row_usuario4['estadocivil']?></td>
           <td><?php echo $row_usuario4['mae']?></td>
                   
           </tr> 
    </table>           
              

           
    
    <h1 style="text-align: center; height: 40px; width: 100%;border: 25px;border-color: black;background-color:blue;border-radius: 5px;color: white;">Carências</h1>
    <table class="table">
  <thead>
    <tr>
    
      <th scope="col">Procedimentos</th>
      <th scope="col">Carências</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td>Urgência e Emergência</td>
      <td>24 horas</td>
      
    </tr>
    <tr>
      
      <td>Restaurações | Limpeza e aplicação de flúor | Radiologia</td>
      <td>24 horas</td>
   
    </tr>
    <tr>
      
      <td>Periodontia (tratamento da gengiva) e endodontia (tratamento de
canal) </td>
      <td>30 dias
</td>
    
    </tr>
    <tr>
      
      <td>Cirurgia e demais procedimentos</td>
      <td>60 dias</td>
   
    </tr>
    <tr>
      
      <td>Prótese</td>
      <td>180 dias</td>
   
    </tr>
    

  </tbody>
</table>
    </html>