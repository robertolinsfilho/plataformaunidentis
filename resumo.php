<?php
session_start();
include_once('conexao.php');
error_reporting(0);

$forekey = $_SESSION['forekey'];

$result_usuario = "SELECT * from dadospessoais where forekey ='$forekey'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

$result_usuario2 = "SELECT * from dependentes where forekey ='$forekey'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);

$result_usuario3 = "SELECT * from dadosprincipais where forekey ='$forekey'";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);

$result_usuario6 = "SELECT * from dependentes  where forekey ='$forekey'";
$resultado_usuario6 = mysqli_query($conexao, $result_usuario6);

switch ($_SESSION['sexo']) {
  case 1:
    $sexo = 'Masculino';
    break;  
  default:
    $sexo = 'Feminino';
    break;
}

?>

<?php
            $cont = $_SESSION['cont'];
            if ($_SESSION['plano'] == 'UNIDENTISVIPBOLETO' && $_SESSION['escolha'] == 'PB' && $cont == 0) {
              $preco = 40;
            } elseif ( $_SESSION['plano'] == 'UNIDENTISVIPBOLETO' && $cont >= 1 && $_SESSION['escolha'] == 'PB') {
              $preco = 35;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPEMPRESARIAL' &&
              $_SESSION['escolha'] == 'PB'
            ) {
              $preco = 18;
            }

            if ($_SESSION['plano'] == 'PLANOVIPORTOCARTAO'){
              $preco = 99.00;
            }

            if (
              $_SESSION['plano'] ==
              'UNIDENTISVIPBOLETO' && $_SESSION['escolha'] == 'RN' && $cont == 0
            ) {
              $preco = 40;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPBOLETO'
              && $cont >= 1 && $_SESSION['escolha'] == 'RN'
            ) {
              $preco = 35;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPEMPRESARIAL' &&
              $_SESSION['escolha'] == 'RN'
            ) {
              $preco = 18;
            }
            if (
              $_SESSION['plano'] ==
              'UNIDENTISVIPCARTAO' && $_SESSION['escolha'] === 'PB' && $cont == 0
            ) {
              $preco = 23.90;
            } elseif (
              $_SESSION['plano'] ==
              'UNIDENTISVIPCARTAO' && $_SESSION['escolha'] == 'PB' && $cont >= 1
            ) {
              $preco = 22.90;
            } elseif (
              $_SESSION['plano'] ==
              'UNIDENTISVIPFAMILIACARTAO' && $cont == 0 && $_SESSION['escolha'] ===
              'PB'
            ) {
              $preco = 60;
            } elseif (
              $_SESSION['plano'] ==
              'UNIDENTISVIPFAMILIACARTAO' && $cont == 1 && $_SESSION['escolha'] ==
              'PB'
            ) {
              $preco = 30;
            } elseif (
              $_SESSION['plano'] ==
              'UNIDENTISVIPFAMILIACARTAO' && $cont >= 2 && $_SESSION['escolha'] ==
              'PB'
            ) {
              $preco = 20;
            } elseif (
              $_SESSION['plano'] ==
              'UNIDENTISVIPUNIVERSITARIOCARTAO' && $cont == 0 &&
              $_SESSION['escolha'] == 'PB'
            ) {
              $preco = 21.90;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
              && $cont == 1 && $_SESSION['escolha'] == 'PB'
            ) {
              $preco = 20.90;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
              && $cont >= 2 && $_SESSION['escolha'] == 'PB'
            ) {
              $preco = 19.90;
            }
            if (
              $_SESSION['plano'] == 'UNIDENTISVIPCARTAO' && $_SESSION['escolha']
              === 'RN' && $cont == 0
            ) {
              $preco = 25.90;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPCARTAO' &&
              $_SESSION['escolha'] == 'RN' && $cont >= 1
            ) {
              $preco = 24.90;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' &&
              $cont == 0 && $_SESSION['escolha'] == 'RN'
            ) {
              $preco = 66;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' &&
              $cont == 1 && $_SESSION['escolha'] == 'RN'
            ) {
              $preco = 33;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' &&
              $cont >= 2 && $_SESSION['escolha'] == 'RN'
            ) {
              $preco = 22;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
              && $cont == 0 && $_SESSION['escolha'] == 'RN'
            ) {
              $preco = 25;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
              && $cont == 1 && $_SESSION['escolha'] == 'RN'
            ) {
              $preco = 24;
            } elseif (
              $_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
              && $cont >= 2 && $_SESSION['escolha'] == 'RN'
            ) {
              $preco = 23;
            }
            $cont += 1;
            $preco2 = $cont * $preco;
            $_SESSION['precoPlano'] = $preco;
            $_SESSION['precoTotal'] = $preco2; ?>

<!DOCTYPE html>
<html>

<head>
  <?php include('include/head.php'); ?>
  <link rel="stylesheet" href="./assets/css/cadastro.css">
  <!-- <link rel="stylesheet" href="./assets/css/formWizard.css"> -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <style>
    /* form .row {
      margin-top: -.5rem;
    } */

    #minhaDiv {
      display: none;

    }

    .col-md-6,
    .col-md-5,
    .col-md-3,
    .col-md-4,
    .col-md-2 {
      background-color: #f6f6f6;
      padding: 4px;
      border-radius: 5px;
    }

    h5.proposta {
      font-size: .9rem;
      width: auto;
      min-width: 40%;
      margin-left: 1%;
      margin-bottom: -.25rem;
      display: flex;
      justify-content: space-between;
      font-size: .75rem;
    }

    h5.proposta>span {
      color: #606060;
      padding: 0 .5rem;
      font-size: 1.75rem;
      line-height: .5rem;
      font-weight: 300;
      position: relative;
      top: 0;
    }

    div.selectCamp {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      overflow: hidden;
    }

    select[name=plano] {
      max-width: 340px;
      padding-left: 0.25rem;
    }

    label.rotulo {
      color: #222222ee;
      padding: 0 0.25rem;
      background-color: #f6f6f6;
      left: 0.5rem;
      position: absolute;
      z-index: 999;
      line-height: 1rem;
      text-transform: lowercase;
      font-size: 0.9rem;
    }

    .form-group input[type="text"] {
      position: relative;
      top: .65rem;
      background: #f6f6f6;
      color: #606060;
      font-family: "Poppins", sans-serif;
      font-size: 0.9rem;
      line-height: 1rem;
      margin: .5rem 0;
      padding: 0.75rem;
    }

    @media (max-width: 500px) {
      .proposta {
        font-size: .55rem !important;
        flex-wrap: wrap !important;
        margin-bottom: .15rem !important;
        justify-content: start !important;
      }

      .proposta span {
        font-size: 1rem !important;
        line-height: .5rem !important;
        padding: 0 .2rem !important;
      }

      div.selectCamp {
        flex-wrap: wrap;
        gap: 1rem;
      }
    }
  </style>
  <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
  <link rel="stylesheet" href="./assets/css/cadastro.css">
</head>

<body>
  <?php include('include/header.php'); ?>
  <?php include('include/sidebar.php'); ?>
  <div class="main-container" style='background-color: #eeeeee; margin-top: 1.5rem;'>
    <div class="
          pd-ltr-20
          height-100-p
          xs-pd-20-10
        ">
      <div class="min-height-200px personalData">
        <div class="page-header">
          <div class="row">
            <h5 class="proposta">
              <p style="color: #606060; font-weight: 600;">INCLUIR PROPOSTA</p> <span>|</span>VALOR TOTAL: <p id='valorPlano'> <?= $_SESSION['precototal'] ? $preco2 : '0' ?></p> <span>|</span> PLANO: <p id='qPlano'> R$<?= $preco; ?> </p> <span>|</span>BENEFICIÁRIOS: <?= $_SESSION['cont'] + 1 ?>
            </h5>
            <br>
            <div class="selectCamp pl-2 pb-2">
              <h4 id='inlineH4' style="color:#606060;white-space: nowrap;font-size: 1.65rem;">ESCOLHA O PLANO: </h4>
              <div class="col-md-10">
                <div class="form-group" style="margin: 0 !important;">
                  <select name="plano" id="plano" class="form-control custom-select" style=" -webkit-appearance: none;-moz-appearance: none; appearance: none; background: url(http://www.webcis.com.br/images/imagens-noticias/select/ico-seta-appearance.gif) no-repeat; background-position: -1000px;" disabled>
                    <option value="<?php echo $_SESSION['plano'] ?>"> <?php echo $_SESSION['plano'] ? $_SESSION['plano'] : 'teste' ?></option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 divPai" style="padding: 0px 2rem; padding-top: 20px; position:relative;">
          <div class="flexLabel" style='margin-top: .5rem;margin-bottom: -.5rem;'>
            <label class="labelInput">Resumo</label>
            <hr>
          </div>
      <a href=javascript:history.back()><button class="btn btn-secondary" id="voltar">Voltar</button></a>
          <form method="post" action="processa.php">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="rotulo" class="rotulo">Nome </label>
                  <input type="text" name="nome" value="<?php echo $_SESSION['nome'] ?>" placeholder="Nome Completo" class="form-control" readonly />
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="rotulo">CPF </label>
                  <input type="text" name="cpf" formato="cpf" value="<?php echo $_SESSION['cpf'] ?>" placeholder="CPF" class="form-control" readonly />
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="rotulo">RG</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION['rg'] ?>" name="rg" placeholder="RG" readonly />
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="rotulo">Orgão Emissor</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION['emissor'] ?>" name="emissor" placeholder="CNS" readonly />
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label class="rotulo">Sexo</label>
                  <input type="text" value="<?php echo $sexo ?>" class="form-control" readonly />
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="rotulo">Nascimento</label>
                  <input type="text" class="form-control date-picker" value="<?php echo $_SESSION['nascimento'] ?>" name="nascimento" placeholder="Data de Nascimento" readonly />
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="rotulo">Estado</label>
                  <input type="text" name="estado" value="<?php echo $_SESSION['estado'] ?>" placeholder="Estado Civil" class="form-control" readonly />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">Nome da Mãe</label>
                  <input type="text" name="mae" value="<?php echo $_SESSION['mae'] ?>" placeholder="Mãe" class="form-control" readonly />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">SUS</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION['sus'] ?>" name="emissor" placeholder="CNS" readonly />
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">E-mail</label>
                  <input type="text" placeholder="Email" value="<?php echo $_SESSION['email'] ?>" name="email" class="form-control" readonly />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">Telefone 1</label>
                  <input type="text" placeholder="Telefone :" name="fixo" value="<?php echo $_SESSION['telefone'] ?>" class="form-control" readonly />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">telefone 2</label>
                  <input type="text" name="telefone" placeholder="Telefone " value="<?php echo $_SESSION['fixo'] ?>" class="form-control" readonly />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">Plano</label>
                  <input type="text" placeholder="Plano " name="sus" value="<?php echo $_SESSION['plano'] ?>" class="form-control" readonly />
                </div>
              </div>
            </div>

            <div class="row">



            </div>

            <?php
            $x = 1;
            while ($row_usuario6 = mysqli_fetch_assoc($resultado_usuario6)) {
            ?>

              <div class="flexLabel" style='margin-top: .75rem;margin-bottom: -.5rem;'>
                <label class="labelInput">Dependente <?php echo $x ?></label>
                <hr>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="rotulo">nome</label>
                    <input type="text" value="<?php echo $row_usuario6['nome'] ?>" class="form-control" readonly />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="rotulo"> Cpf</label>
                    <input type="text" formato="cpf" value="<?php echo $row_usuario6['cpf'] ?>" class="form-control" readonly />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="rotulo"> Datas de nascimento</label>
                    <input type="text" value="<?php echo $row_usuario6['datas'] ?>" class="form-control" readonly />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="rotulo"> Sexo</label>
                    <input type="text" value="<?php echo $sexo ?>" class="form-control" readonly />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="rotulo"> Mãe</label>
                    <input type="text" value="<?php echo $row_usuario6['mae'] ?>" class="form-control" readonly />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="rotulo"> Cns</label>
                    <input type="text" formato="cns" value="<?php echo $row_usuario6['cns'] ?>" class="form-control" readonly />
                  </div>
                </div>

                <?php
                if ($row_usuario6['parentesco'] == 3) {
                  $parentesco = 'Cônjuge';
                } elseif ($row_usuario6['parentesco'] == 4) {
                  $parentesco = 'Filho';
                } elseif ($row_usuario6['parentesco'] == 6) {
                  $parentesco = 'Enteado';
                } elseif ($row_usuario6['parentesco']  == 8) {
                  $parentesco = 'Pai/Mãe';
                } elseif ($row_usuario6['parentesco'] == 10) {
                  $parentesco = 'Outros';
                }
                ?>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="rotulo"> Parentesco</label>
                    <input type="text" value="<?php echo $parentesco ?>" class="form-control" readonly />
                  </div>
                </div>
              </div>

            <?php
              $x++;
            }
            ?>

            <div class="flexLabel" style='margin-top: .75rem;margin-bottom: -.5rem;'>
              <label class="labelInput">Endereço</label>
              <hr>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">CEP</label>
                  <input type="text" name="cep" id="cep" class="form-control" value="<?php echo $_SESSION['cep'] ?>" placeholder="CEP" readonly />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">Rua</label>
                  <input type="text" class="form-control" id="rua" value="<?php echo $_SESSION['rua'] ?>" name="rua" placeholder="Rua" readonly />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">Número</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION['numero'] ?>" name="numero" placeholder="Numero" readonly />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">UF</label>
                  <input type="text" name="uf" id="uf" class="form-control" value="<?php echo $_SESSION['escolha'] ?>" placeholder="estado" readonly />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">Complemento</label>
                  <input type="text" name="complemento" placeholder="Complemento" value="<?php echo $_SESSION['complemento'] ?>" class="form-control" readonly />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">Cidade</label>
                  <input type="text" name="cidade" id="cidade" value="<?php echo $_SESSION['cidade'] ?>" class="form-control" placeholder="Ex: joao pessoa" readonly />
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="rotulo">Bairro</label>
                  <input type="text" name="bairro" id="bairro" class="form-control" value="<?php echo $_SESSION['bairro'] ?>" placeholder="Bairro" readonly />
                </div>
              </div>
            </div>       
            <br>
            <div class="d-flex justify-content-center align-items-end flex-wrap" style="margin-left: -.5rem;">

              <div id="resumo" class="mr-auto">
                <h2 style="font-family: 'Poppins', sans-serif;font-size:1rem; color: #ffffff;text-transform: uppercase;">Resumo da Proposta </h2>
                <h3 style="font-family: 'Poppins', sans-serif;font-size:.9rem">Valor por Beneficiário <span id="planDental"><?php echo $preco ?></span></h3>
                <hr style='background-color: #ffffff;'>
                <h3 style="font-family: 'Poppins', sans-serif;font-size:.9rem">Total <span id="resuPreco"><?php echo $preco2 ?></span></h3>

              </div>
              <a href="./pdf/pdfmaker.php" target="_blank" class="btn btn-secondary" style="margin-bottom: 1rem;"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</a>
              <!-- <input class="btn btn-success" id="submit" type="submit" style='margin-left: 0;' /> -->
              <input type="submit" id="avanca" class="btn btn-success saveBtn" style="top: -3rem; padding: 0.3rem 0.5rem;" 
              value="Enviar"/>
            </div>

        </div>
        <script>
          const valueDentalPlan = parseFloat(document.querySelector("#planDental").innerText).toLocaleString("pt-BR", {
            style: 'currency',
            currency: 'BRL'
          });
          const valueResumPrice = parseFloat(document.querySelector("#resuPreco").innerText).toLocaleString("pt-BR", {
            style: 'currency',
            currency: 'BRL'
          });
          const valuePlan = parseFloat(document.querySelector("#valorPlano").innerText).toLocaleString("pt-BR", {
            style: 'currency',
            currency: 'BRL'
          });


          function toBRL() {
            document.querySelector("#planDental").innerHTML = valueDentalPlan;
            document.querySelector("#resuPreco").innerHTML = valueResumPrice;
            document.querySelector("#valorPlano").innerHTML = valuePlan;
          }
          toBRL();
        </script>
      </div>
      </form>
      <?php include('include/footer.php'); ?>
    </div>
  </div>
  </div>
  <?php include('include/script.php'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script>
    $('[formato=cpf]').mask('999.999.999-99');
    $('[formato=cnpj]').mask('99.999.999/9999-99');
    // $('[formato=telefone]').mask('(99) 99999-9999');
    $('[formato=cns]').mask('999 9999 9999 9999');
    $('[formato=data]').mask("00-00-0000");
  </script>
  <script>
    $(document).ready(function() {
      function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
      }

      //Quando o campo cep perde o foco.
      $("#cep").blur(function() {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, "");

        //Verifica se campo cep possui valor informado.
        if (cep != "") {
          //Expressão regular para validar o CEP.
          var validacep = /^[0-9]{8}$/;

          //Valida o formato do CEP.
          if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            $("#rua").val("...");
            $("#bairro").val("...");
            $("#cidade").val("...");
            $("#uf").val("...");
            $("#ibge").val("...");

            //Consulta o webservice viacep.com.br/
            $.getJSON(
              "https://viacep.com.br/ws/" + cep + "/json/?callback=?",
              function(dados) {
                if (!("erro" in dados)) {
                  //Atualiza os campos com os valores da consulta.
                  $("#rua").val(dados.logradouro);
                  $("#bairro").val(dados.bairro);
                  $("#cidade").val(dados.localidade);
                  $("#uf").val(dados.uf);
                  $("#ibge").val(dados.ibge);
                } //end if.
                else {
                  //CEP pesquisado não foi encontrado.
                  limpa_formulário_cep();
                  alert("CEP não encontrado.");
                }
              }
            );
          } //end if.
          else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
          }
        } //end if.
        else {
          //cep sem valor, limpa formulário.
          limpa_formulário_cep();
        }
      });
    });
  </script>
  </div>
</body>

</html>