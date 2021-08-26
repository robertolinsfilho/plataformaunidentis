<?php
session_start();
include_once('conexao.php');
error_reporting(0);

$result_usuario = "SELECT * from dadospessoais where cpf ='$cpf'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$result_usuario2 = "SELECT COUNT(*)  AS total from dependentes where cpf_titular ='$_SESSION[cpf]'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
$result_usuario3 = "SELECT * from dadosprincipais where cpf ='$cpf'";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);
$result_usuario6 = "SELECT * from dependentes  where cpf_titular  = '$_SESSION[cpf]' ";
$resultado_usuario6 = mysqli_query($conexao, $result_usuario6);
if ($_SESSION['sexo'] = 1){
	$sexo = 'Masculino';
}else{
	$sexo = 'Feminino';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <?php include('include/head.php'); ?>
    <style>
	.form-control{
		height: 2rem !important;
		background-color: #fff !important;
	} 
	.form-group{
		margin-bottom: .5rem !important;
	}
      label {
        color: #606060;
      }
      input,
      select {
        border: 1px solid #606060 !important;

        background-color: #b3b3b3;
      }
      #resumo {
        margin-left: 0%;
        background-color: #4177d0;
        padding: 20px;
      }
      #submit {
        background-color: #3284f1;
        margin-left: 80%;
        width: 20%;
      }
	  #h5 {
		margin-left: 1%;
	  }
	.flexLabel{
		display: flex;
		align-items: center;
		justify-content: space-between;
		margin: .5rem 0;
	}

	.flexLabel .labelInput{
		font-size: .9rem;
		white-space: nowrap;
		padding-right: 1rem;
		font-weight: bold;
		color: #606060;
		text-transform: uppercase;
		font-size: 1.5rem;
        line-height: 1.875rem;
	}

	.flexLabel hr{
		position: relative;
		top: -.15rem;
		display: block;
		width: 100%;
		height: 1px;
		background-color: #606060;
	}

	h4.h4 {
		font-size: 1.5rem;
		line-height: 1.875rem;
	}
      @media screen and (max-device-width: 720px) {
        .inline {
          width: 50%;
        }
        #submit {
          background-color: #3284f1;
          margin-left: 14%;
          margin-top: 5%;
          width: 76%;
        }
        #resumo {
          width: 80%;
        }
		.row.resumo{
			align-items: center !important;
    		justify-content: center !important;
		}
      }
    </style>
  </head>
  <body>
    <?php include('include/header.php'); ?>
    <?php include('include/sidebar.php'); ?>
    <div class="main-container" style='background-color: #eeeeee;'>
      <div
        class="
          pd-ltr-20
          customscroll customscroll-10-p
          height-100-p
          xs-pd-20-10
        "
      >
        <div class="min-height-200px">
          <div class="page-header">
            <div class="row" style='margin-top: .5rem;margin-bottom: .5rem;'>
              <?php echo '<h5 id="h5" style="font-size: .9rem;width:98vw;margin-bottom: .25rem;"><span style="font-size:1rem;font-weight:bold;color:#606060;"> INCLUIR PROPOSTA</span> | VALOR TOTAL : '.$_SESSION['precototal'] .' | PLANO : ' .  $_SESSION['plano'] .' | DEPENDENTES :  '. $_SESSION['cont'] .  '</h5>'?> 
			</div>
			<div class="row" style='margin-bottom: 1rem;'>
              <div
                class="inline"
                style="
                  display: -webkit-inline-box;
                  margin-left: 1%;
                  margin-top: 1%;
                "
              >
                <h4 id="h4" style="color:#606060;padding-top:2px;font-size: 1rem;line-height: 1.5rem; ">
                  Escolha o Plano :
                </h4>
                <input
                  id="plano"
                  class="form-control"
                  style="margin-left: 1rem;background-color:#b3b3b3;height: calc(2rem + 2px) !important;background-color: #b3b3b3 !important;"
                  value="<?php echo $_SESSION['plano']?>"
                  readonly
                />
              </div>
            </div>
          </div>
          <!-- Default Basic Forms Start -->
          <div class="pd-20 bg-white border-radius-4 box-shadow mb-30" style='background-color: #f6f6f6;padding: .5rem 1.5rem;'>
		  	<div class="flexLabel">
			  <label class="labelInput">Resumo</label>
              <hr>
            </div>
            <form method="post" action="processa.php">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nome: </label>
                    <input
                      type="text"
                      name="nome"
                      value="<?php echo $_SESSION['nome']?>"
                      placeholder="Nome Completo"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>CPF: </label>
                    <input
                      type="text"
                      name="cpf"
                      value="<?php echo $_SESSION['cpf']?>"
                      placeholder="CPF"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>RG:</label>
                    <input
                      type="text"
                      class="form-control"
                      value="<?php echo $_SESSION['rg']?>"
                      name="rg"
                      placeholder="RG"
                      readonly
                    />
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Orgão Emissor:</label>
                    <input
                      type="text"
                      class="form-control"
                      value="<?php echo $_SESSION['emissor']?>"
                      name="emissor"
                      placeholder="CNS"
                      readonly
                    />
                  </div>
                </div>
              </div>
              <div class="row">
			  	<div class="col-md-2">
                  <div class="form-group">
                    <label>Sexo:</label>
                    <input
                      type="text"
                      value="<?php echo $sexo?>"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>
				<div class="col-md-2">
                  <div class="form-group">
                    <label>Nascimento:</label>
                    <input
                      type="text"
                      class="form-control date-picker"
                      value="<?php echo $_SESSION['nascimento']?>"
                      name="nascimento"
                      placeholder="Data de Nascimento"
                      readonly
                    />
                  </div>
                </div>
				<div class="col-md-2">
                  <div class="form-group">
                    <label>Estado:</label>
                    <input
                      type="text"
                      name="estado"
                      value="<?php echo $_SESSION['estado']?>"
                      placeholder="Estado Civil"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Nome da Mãe:</label>
                    <input
                      type="text"
                      name="mae"
                      value="<?php echo $_SESSION['mae']?>"
                      placeholder="Mãe"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>
				<div class="col-md-3">
                  <div class="form-group">
                    <label>SUS:</label>
                    <input
                      type="text"
                      class="form-control"
                      value="<?php echo $_SESSION['sus']?>"
                      name="emissor"
                      placeholder="CNS"
                      readonly
                    />
                  </div>
                </div>
                
              </div>

              <div class="row">
			  <div class="col-md-3">
                  <div class="form-group">
                    <label>Email:</label>
                    <input
                      type="email"
                      placeholder="Email"
                      value="<?php echo $_SESSION['email']?>"
                      name="email"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Telefone 1:</label>
                    <input
                      type="text"
                      placeholder="Telefone :"
                      name="fixo"
                      value="<?php echo $_SESSION['telefone']?>"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>telefone 2:</label>
                    <input
                      type="text"
                      name="telefone"
                      placeholder="Telefone "
                      value="<?php echo $_SESSION['fixo']?>"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Plano:</label>
                    <input
                      type="text"
                      placeholder="Plano "
                      name="sus"
                      value="<?php echo $_SESSION['plano']?>"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>
              </div>

              <div class="row">
			  

                
              </div>

                <?php
                $x = 1;
                while ($row_usuario6 = mysqli_fetch_assoc($resultado_usuario6)){
                ?>

              <div class="inline" style="margin-bottom: 1.25rem;margin-top: .5rem;" >
                <h4 class='h4' style="color: #606060; font-weight: bold; text-transform: uppercase;">
                  Beneficiario
                  <?php echo $x ?>
                </h4>
                <br />
                <hr
                  style="
                    width: 88%;
                    position: relative;
                    margin-top: -2%;
                    margin-left: 12%;
                    font-weight: bold;
                    height: 1px;
                    background-color: #606060;
                  "
                  size="50"
                />
              </div>
              <br />
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>nome:</label>
                    <input
                      type="text"
                      value="<?php echo $row_usuario6['nome']?>"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label> Cpf:</label>
                    <input
                      type="text"
                      value="<?php echo $row_usuario6['cpf']?>"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label> Datas de nascimento:</label>
                    <input
                      type="text"
                      value="<?php echo $row_usuario6['datas']?>"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label> Sexo:</label>
                    <input
                      type="text"
                      value="<?php echo $sexo ?>"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label> Mae:</label>
                    <input
                      type="text"
                      value="<?php echo $row_usuario6['mae']?>"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label> Cns:</label>
                    <input
                      type="text"
                      value="<?php echo $row_usuario6['cns']?>"
                      class="form-control"
                      readonly
                    />
				</div>
			</div>

                <?php 
                    if($row_usuario6['parentesco'] == 3){
                        $parentesco = 'Cônjuge';
                    }elseif($row_usuario6['parentesco'] == 4){
                        $parentesco = 'Filho';
                    }elseif($row_usuario6['parentesco'] == 6){
                        $parentesco = 'Enteado';
                    }elseif($row_usuario6['parentesco']  == 8){
                        $parentesco = 'Pai/Mãe';
                    }elseif($row_usuario6['parentesco'] == 10){
                        $parentesco = 'Outros';
                    }
                ?>
                <div class="col-md-3">
                  <div class="form-group">
                    <label> Parentesco:</label>
                    <input
                      type="text"
                      value="<?php echo $parentesco?>"
                      class="form-control"
                      readonly
                    />
                  </div>
                </div>
              </div>

              	<?php
					$x++;	
					}
				?>

              <div class="flexLabel">
			  <label class="labelInput">Endereço</label>
				<hr>
              </div>
			<div class="row">
			<div class="col-md-3">
				<div class="form-group">
				<label>CEP:</label>
				<input
					type="text"
					name="cep"
					id="cep"
					class="form-control"
					value="<?php echo $_SESSION['cep']?>"
					placeholder="CEP"
					readonly
				/>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
				<label>Rua:</label>
				<input
					type="text"
					class="form-control"
					id="rua"
					value="<?php echo $_SESSION['rua']?>"
					name="rua"
					placeholder="Rua"
					readonly
				/>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
				<label>Numero:</label>
				<input
					type="text"
					class="form-control"
					value="<?php echo $_SESSION['numero']?>"
					name="numero"
					placeholder="Numero"
					readonly
				/>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
				<label>UF:</label>
				<input
					type="text"
					name="uf"
					id="uf"
					class="form-control"
					value="<?php echo $_SESSION['uf']?>"
					placeholder="estado"
					readonly
				/>
				</div>
			</div>
			</div>

			<div class="row">
				<div class="col-md-3">
				<div class="form-group">
					<label>Complemento:</label>
					<input
					type="text"
					name="complemento"
					placeholder="Complemento"
					value="<?php echo $_SESSION['complemento']?>"
					class="form-control"
					readonly
					/>
				</div>
				</div>
				<div class="col-md-3">
				<div class="form-group">
					<label>Cidade:</label>
					<input
					type="text"
					name="cidade"
					id="cidade"
					value="<?php echo $_SESSION['cidade']?>"
					class="form-control"
					placeholder="Ex: joao pessoa"
					readonly
					/>
				</div>
				</div>

				<div class="col-md-3">
				<div class="form-group">
					<label>Bairro:</label>
					<input
					type="text"
					name="bairro"
					id="bairro"
					class="form-control"
					value="<?php echo $_SESSION['bairro']?>"
					placeholder="Bairro"
					readonly
					/>
				</div>
				</div>
			</div>

                <?php
						
				$cont = $row_usuario2['total'];

				if($_SESSION['plano'] == 'UNIDENTISVIPBOLETO' && $_SESSION['uf'] == 'PB' && $cont == 0 ){
					$preco = 40;
				}elseif($_SESSION['plano'] == 'UNIDENTISVIPBOLETO' && $cont >= 1 &&
                $_SESSION['uf'] == 'PB'){ $preco = 35;
                }elseif($_SESSION['plano'] == 'UNIDENTISVIPEMPRESARIAL' &&
                $_SESSION['uf'] == 'PB'){ $preco =18; } if($_SESSION['plano'] ==
                'UNIDENTISVIPBOLETO' && $_SESSION['uf'] == 'RN' && $cont == 0 ){
                $preco = 40; }elseif($_SESSION['plano'] == 'UNIDENTISVIPBOLETO'
                && $cont >=1 && $_SESSION['uf'] == 'RN'){ $preco = 35;
                }elseif($_SESSION['plano'] == 'UNIDENTISVIPEMPRESARIAL' &&
                $_SESSION['uf'] == 'RN'){ $preco =18; } if($_SESSION['plano'] ==
                'UNIDENTISVIPCARTAO' && $_SESSION['uf'] === 'PB' && $cont == 0){
                $preco = 23.90; }elseif($_SESSION['plano'] ==
                'UNIDENTISVIPCARTAO' && $_SESSION['uf']== 'PB' && $cont >= 1) {
                $preco = 22.90; }elseif($_SESSION['plano'] ==
                'UNIDENTISVIPFAMILIACARTAO' && $cont == 0 && $_SESSION['uf'] ===
                'PB'){ $preco = 60; }elseif($_SESSION['plano'] ==
                'UNIDENTISVIPFAMILIACARTAO' && $cont == 1 && $_SESSION['uf'] ==
                'PB'){ $preco =30; }elseif($_SESSION['plano'] ==
                'UNIDENTISVIPFAMILIACARTAO' && $cont >= 2 && $_SESSION['uf'] ==
                'PB'){ $preco = 20; }elseif($_SESSION['plano'] ==
                'UNIDENTISVIPUNIVERSITARIOCARTAO' && $cont == 0 &&
                $_SESSION['uf'] == 'PB'){ $preco = 21.90;
                }elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
                && $cont == 1 && $_SESSION['uf']== 'PB'){ $preco = 20.90;
                }elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
                && $cont >= 2 && $_SESSION['uf'] == 'PB'){ $preco = 19.90; }
                if($_SESSION['plano'] == 'UNIDENTISVIPCARTAO' && $_SESSION['uf']
                === 'RN' && $cont == 0 ){ $preco = 25.90;
                }elseif($_SESSION['plano'] == 'UNIDENTISVIPCARTAO' &&
                $_SESSION['uf'] == 'RN' && $cont >= 1) { $preco = 24.90; }
                elseif($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' &&
                $cont == 0 && $_SESSION['uf'] == 'RN'){ $preco = 66;
                }elseif($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' &&
                $cont == 1 && $_SESSION['uf'] == 'RN'){ $preco =33;
                }elseif($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' &&
                $cont >= 2 && $_SESSION['uf'] == 'RN'){ $preco = 22;
                }elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
                && $cont == 0 && $_SESSION['uf'] == 'RN'){ $preco = 25;
                }elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
                && $cont == 1 && $_SESSION['uf'] == 'RN'){ $preco = 24;
                }elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO'
                && $cont >= 2 && $_SESSION['uf'] == 'RN'){ $preco = 23; } $cont
                = $cont + 1; $preco = $cont * $preco; ?>
				<div class='row resumo' style='
				    align-items: flex-end;
					justify-content: space-between;
					padding: 1rem;
				'>
					<div id="resumo" class='col-md-4'>
					  <h3
						style="
						  font-family: 'Poppins', sans-serif;
						  font-size: 20px;
						  color: white;
						"
					  >
						Plano Dental : R$:<?php echo $preco?>
					  </h3>
					  <hr />
					  <h3
						style="
						  font-family: 'Poppins', sans-serif;
						  font-size: 20px;
						  color: white;
						"
					  >
						Total: R$:<?php echo $preco?>
					  </h3>
					</div>
				  <input class="btn btn-success" id="submit" type="submit" style='margin-left: 0;' />
				</div>
            </form>
          </div>
          <?php include('include/footer.php'); ?>
        </div>
      </div>
      <?php include('include/script.php'); ?>
      <script>
        $(document).ready(function () {
          function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
          }

          //Quando o campo cep perde o foco.
          $("#cep").blur(function () {
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
                  function (dados) {
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
