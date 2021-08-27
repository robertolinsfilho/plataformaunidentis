<?php
session_start();
?>
<html>

<head>
    <?php include('include/head.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#myModal').modal('show');
        });
    </script>
    <style>
    h2{
        font-family:Poppins;
    }
    </style>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

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
            <img style='display: block;margin: 0 auto;' src="http://unidentisdigital.com.br/assets/img/LOGO.png" width="300">
            <h4 style="font-size: 1.2rem;">PARABÉNS!<br> <span style="font-size:1rem; line-height: 1.5rem;">SEU PLANO FOI CONCLUÍDO COM SUCESSO. AGORA É SÓ AGUARDAR PARA QUE O PROPOSTA SEJA ANALISADA E FINALIZADA</span></h2>
            </div>
            <div class="modal-footer">
               <a  href="login2"  class="btn btn-secondary" type="button" >fechar</a>

            </div>
        </div>
    </div>
</div>

</body>

</html>
