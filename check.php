<?php
session_start();


 
//Criar a conexao

$cpf = $_POST['cpf'];
$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);
$_SESSION['cpf'] = $cpf;
/* check connection */
$url = "http://unidentis.s4e.com.br/v2/api/associados?token=RWNTF7PUC87KRYRTVNFGP8XNYWJ4DQC4XWCGSHPW2F9FCURP82&limite=50&cpfDependente=$cpf";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($curl),true);
$resultado = $resultado['dados'];
$x =0;
$y = 0;
$z=0;
foreach($resultado as $value){
   
    foreach($value['dependentes'] as $value1){
       
        foreach( (array)$value1['nomeSituacao'] as $value2){
          
           
           if($value2 != 'CANCELADO'){
           $x = 1;
           
           $_SESSION['ruadependente'] = $value['logradouro'];
           $_SESSION['bairrodependente'] = $value['bairro'];
              $_SESSION['cepdependente'] = $value['cep'];
              $_SESSION['ufdependente'] = $value['ufSigla'];
              $_SESSION['numerodependente'] = $value['numero'];
            $_SESSION['nomedependente'] = $value1['nomeDependente'];
            $_SESSION['nomeplano'] = $value1['nomePlano'];
           if( $_SESSION['nomeplano'] == 'UNIDENTIS VIP CARTÃO'){
            $_SESSION['nomeplano'] == 'UNIDENTIS VIP CARTAO';
           }
           
           
           }
        }
      
    }
  
}

foreach($resultado as $value){
   
  foreach($value['dependentes'] as $value1){
    
      foreach( (array)$value['contatos'] as $value2){
        
        
         if($value1['nomeSituacao'] != 'CANCELADO'){
         
         if($value2['tipo'] == 'Celular'){
         $_SESSION['celulardependente'] = $value2['descricaoContato'];
          $y=1;
         }
         if($value2['tipo'] == 'E-mail'){
          $_SESSION['emaildependente'] = $value2['descricaoContato'];
          $z=1;
          }
         
         }
      }
    
  }

}

if($value1['nomePlano'] == 'UNIDENTIS VIP EMPRESARIAL'){
 echo $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
  Plano Empresa
</div>";
header('Location: incluirdependentes');

exit();
}


echo $x, $y, $z;
if($x == 0 or $y == 0 or $z == 0  ){
 echo $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
  CPF Inexistente
</div>";
header('Location: incluirdependentes');
}else{


    header('Location: incluirformtitular#centro');




  
  
  }



?>





