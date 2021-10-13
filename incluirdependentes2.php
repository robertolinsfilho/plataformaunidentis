
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
  <title>Unidentis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- Google Fonts -->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <!-- Vendor CSS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <!-- Template Main CSS File -->

  <!-- Template Main CSS File -->
    <?php
    include_once("conexao.php");
    session_start();

    $cpf = $_POST['cpf'];
    $_SESSION['cpf'] = $cpf;
    if($cpf == ''){
        $cpf = $_GET['cpf'];
        $_SESSION['cpf'] = $cpf;
    }



    $result_usuario = "SELECT * from dadospessoais where cpf = '$cpf'";
    $resultado_usuario = mysqli_query($conexao, $result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);

    $result_usuario1 = "SELECT * from dependentes where cpf_titular = '$cpf' and status = 'Em Analise'";
    $resultado_usuario1 = mysqli_query($conexao, $result_usuario1);
    $row_usuario1 = mysqli_fetch_assoc($resultado_usuario1);

    $result_usuario2 = "SELECT * from endereco where cpf = '$cpf'";
    $resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
    $row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);

    $result_usuario3 = "SELECT *  from dependentes where cpf_titular = '$cpf' and status = 'Em Analise' ";
    $resultado_usuario3 = mysqli_query($conexao, $result_usuario3);






    ?>

    <style>
        #dependente{
            background-color: #005cbf;
            position: relative;
            display: inline-block;
            width: 15%;
            margin-left: 10%;
            border-radius: 20%;
            text-align: center;
            height: 200px;
        }

        #incluir{
            height: auto;
        }
        #incluir h3 span{
            color: #106eea;
        }
    </style>
  <link href="assets/css/style.css" rel="stylesheet">

</head>


<script type="text/javascript">
          $("#telefone, #celular").mask("(00) 00000-0000");
            $("#data").mask("00-00-1998");

          $("#cpf").mask("000.000.000-00");
          $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})


        </script>
<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
      <div class="container d-flex">
          <div class="contact-info mr-auto">
              <i class="icofont-envelope"></i> <a href="mailto:contato@unidentis.com.br">contato@unidentis.com.br</a>
              <i class="icofont-phone"></i> 83 30443000
              <i class="icofont-ambulance"></i> <a data-toggle="modal" data-target="#exampleModal3" >Urgência e Emergência</a>
              <i class="icofont-certificate-alt-1"></i> <a data-toggle="modal" data-target="#exampleModal1" >Imposto de Renda</a>
          </div>
          <div class="social-links">

              <a href="https://pt-br.facebook.com/unidentisplanoodontologico" class="facebook"><i class="icofont-facebook"></i></a>
              <a href="https://www.instagram.com/unidentisplanoodontologico/?hl=en" class="instagram"><i class="icofont-instagram"></i></a>

              <a href="https://www.linkedin.com/company/unidentis-assitencia-odontologica-ltda/?originalSubdomain=br" class="linkedin"><i class="icofont-linkedin"></i></a>
          </div>
      </div>
  </div>
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">LOCALIZAÇÃO DAS CLÍNICAS </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <h4> Paraíba</h4>
                  RUA DOUTOR OSÓRIO ABATH, N° 46, TORRE, JOÃO PESSOA-PB, CEP - 58040-750.<br>
                  <h5>Contato Via WhatsApp:</h5>
                  <a href="https://api.whatsapp.com/send/?phone=5583986176071&text&app_absent=0">Clique aqui</a><br><br><br>
                  <h4>Rio Grande Do Norte </h4>
                  HOSPITAL RIO GRANDE , N° 754, TIROL, NATAL- RN, CEP - 59020-100.<BR>
                  <h5>Telefone: 84 4009-1000</h5>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-weight: 500 !important;">Fechar</button>

              </div>
          </div>
      </div>
  </div>
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Primeiro Acesso</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <h5> ACESSE COM O NÚMERO DO CPF DO TITULAR DO PLANO E A SENHA INICIAL 1234 </h5>
                  <br>



              </div>
              <div class="modal-footer">
                  <a href="https://unidentis.s4e.com.br/SYS/?TipoUsuario=1"> <button type="button" class="btn btn-secondary"  style="font-weight: 500 !important;" >Acessar</button></a>

              </div>
          </div>
      </div>
  </div>
  <style>
      #blip-chat-container #blip-chat-open-iframe {background-color: red; width: 8%;max-width: 100px;max-height: 100px;}

      @media screen and (max-width: 480px), screen and (max-height: 420px) {
          #blip-chat-container #blip-chat-open-iframe {background-color: red; width: 30%;max-width: 100px;max-height: 100px;}
      }

  </style>

  <script src="https://unpkg.com/blip-chat-widget@1.6.*" type="text/javascript">
  </script>
  <script>
      (function () {
          window.onload = function () {

              new BlipChat()
                  .withAppKey('dW5pZGVudGlzOjU1YWE1MzYzLTRjYWQtNDNiMC1iZmFhLTc4MzBkMjA4OGY4MA==')
                  .withButton({"color":"#023BBF","icon":"https://s3-sa-east-1.amazonaws.com/msging.net/iris/Media_23d982b2-566d-47b2-b21a-2d46b14ac37d"})
                  .withCustomCommonUrl('https://chat.blip.ai/')
                  .build();
          }
      })();
  </script>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">

          <a href="index.html"><img style="width: 38%; height: 25%;"src="http://unidentisdigital.com.br/assets/img/LOGO.png" /></a>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

          <nav class="nav-menu d-none d-lg-block">
              <ul>
                  <li class="active"><a href="index.html">Início</a></li>
                  <li><a href="redecredenciada.php">Rede Credenciada</a></li>

                  <li><a href="carteirinha.php">Carteira Digital</a></li>

                  <li><a href="segundavia.php">Boleto</a></li>
                  <li><a href="tiss.html">Portal Tiss</a></li>


              </ul>
          </nav><!-- .nav-menu -->

      </div>
  </header><!-- End Header -->


  <section id="incluir"  class="d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <form method="POST" action="incluirdependentes3.php">
        <br><br><br><br>
        <h3><span>Dados Pessoais</span></h3>
        <div class="row">

            <div class="col">

                <label>Nome</label>
                <input type="text" class="form-control" value="<?php echo $row_usuario['nome']?>" readonly>
            </div>
            <div class="col">
                <label>E-mail</label>
                <input type="text" class="form-control" value="<?php echo $row_usuario['email']?>"readonly>
            </div>
            <div class="col">
                <label>Telefone</label>
                <input type="text" class="form-control" id="celular" value="<?php echo $row_usuario['celular']?>" readonly>
            </div>
        </div>
        <br>
        <h3><span>Endereço</span></h3>
        <div class="row">

            <div class="col">

                <label>Rua</label>
                <input type="text" class="form-control" value="<?php echo $row_usuario2['rua'] ?>" readonly>
            </div>
            <div class="col">
                <label>Cidade</label>
                <input type="text" class="form-control" value="<?php echo $row_usuario2['cidade'] ?>" readonly>
            </div>
            <div class="col">
                <label>Estado</label>
                <input type="text" class="form-control" value="<?php echo $row_usuario2['estado'] ?>" readonly>
            </div>
        </div>
        <br>
        <button type="button" style="margin-left: 41%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cadastrar Novo Dependente
        </button>
    </div>
  </section>


  <?php
  $x =0;



  while ($row_usuario3 = mysqli_fetch_assoc($resultado_usuario3)){


  ?>
<section id="dependente">

    <h4 style="color: yellow"><?php echo $row_usuario3['nome']; ?></h4>
    <h4  style="color: yellow"><?php echo $row_usuario3['parentesco']; ?></h4>


    <a href="delete.php?id=<?php echo $row_usuario3['id'] ?>" ><input type="button" value="Excluir" class="btn btn-danger"></a>

</section>

  <?php



  }

  ?>

  <a class="btn  btn-success" style="width: 15%; height: 60px;margin-left: 75%; font-size: 18px" href="inclusaodependentes.php">Concluir</a>
<br><br>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col">


                        <select class="form-control"name="parentesco" required>

                            <option value="conjuge">CÔNJUGE</option>
                            <option value="filho">FILHO(A)</option>
                            <option value="enteado">ENTEADO(A)</option>
                            <option value="outro">OUTRO</option>
                        </select>
                    </div>
                    <div class="col">

                        <input type="text" placeholder="Nome Completo" name="nome" class="form-control" required>
                    </div>
                    <div class="col">

                        <input type="text" placeholder="CPF" name="cpf" id="cpf" class="form-control" required>
                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="col">


                        <input type="text" PLACEHOLDER="Data de nascimento" name="nascimento" id="data" class="form-control"  required>
                    </div>
                    <div class="col">

                        <input type="text" placeholder="CNS (Cartão do SUS)" name="sus" maxlength="15" minlength="15" class="form-control" required>
                    </div>
                    <div class="col">

                        <input type="text" placeholder="Telefone" name="telefone" id="telefone"class="form-control" required>
                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="col">

                        <select name="estado" class="form-control">

                            <option value="solteiro">Solteiro(a)</option>
                            <option value="casado">Casado(a)</option>
                            <option value="viuvo">Viúvo(a)</option>
                            <option value="divorciado">Divorciado(a)</option>
                        </select>
                    </div>
                    <div class="col">

                        <select name="sexo" class="form-control">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="col">

                        <input type="text" placeholder="Nome da Mãe" name="mae" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </div>
    </form>

</div>
</body>
<div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</html>