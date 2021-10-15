<?php
session_start();
?>
<html>

<head>
    <?php include('include/head.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- fonte -->
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet">
    <script>
        $(document).ready(function(){
            $('#myModal').modal('show');
        });
    </script>
    <style>
    h2{
        font-family: 'Poppins', sans-serif;
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
                    <span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <img style='display: block;margin: 0 auto;' src="http://unidentisdigital.com.br/assets/img/LOGO.png" width="240">
            <h4 style="font-size: 1.5rem; line-height: 2rem">PARABÉNS! <br> <p style="margin-top: 1rem; margin-bottom: .75rem;font-size:1rem; line-height: 1.25rem;">Seu plano foi concluído com sucesso!</p><p style="margin-top: 1rem; margin-bottom: .25rem;font-size:1rem; line-height: 1.25rem;"> Agora é só aguardar para que a proposta seja analisada e finalizada.</p></h4>
            </div>
            <div class="modal-footer">
               <a  href="login2"  class="btn btn-secondary" type="button" style="font-weight: 500 !important;">fechar</a>

            </div>
        </div>
    </div>
</div>

</body>

</html>
