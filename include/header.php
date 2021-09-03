<?php
include "conexao.php";
session_status() == '2'? '' : session_start();
$result_usuario2 = "SELECT * from vendedor where email = '$_SESSION[usuario]'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
	?>
	<style>
        @media(min-width: 480px) {
            #drop {
                visibility: hidden;
            }
        }
        @media(max-width: 480px){
            #drop {
                margin-left: 40%;
                margin-top: 4%;
            }
            .brand-logo{
                display: none;
            }
            .user-info-dropdown{
                margin-top: -4%;
                visibility: hidden;
            }
        }
        .user-info-dropdown{
            margin-top: -4%;

        }
    </style>
  
	<div id="preloader" class="pre-loader"></div>

	<div class="header clearfix">
		<div style="background-color: #284ebf;height:130%;" class="header-right">
			<div class="brand-logo">
				<a href="index.php">
					<img src="https://unidentisdigital.com.br/assets/img/LOGO.png" alt="" class="mobile-logo">
				</a>

			</div>
            <div id="drop">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index">Home</a>
                        <a class="dropdown-item" href="propostas">Incluir Proposta</a>
                        <a class="dropdown-item" href="link">Link</a>
                        <a class="dropdown-item" href="datatable">Geral</a>
                        <a class="dropdown-item" href="indeferidas">Indeferidas</a>
                        <a class="dropdown-item" href="averbacao">Averbação</a>
                        <a class="dropdown-item" href="analise">Analise</a>
                        <a class="dropdown-item" href="canceladas">Canceladas</a>
                        <a class="dropdown-item" href="implantadas">Implantadas</a>
                        <a class="dropdown-item" href="dependentes">Dependentes</a>
                        <a class="dropdown-item" href="https://unidentisdigital.com.br/login">Sair</a>
                    </div>
                </div>
            </div>
			<div style=" color:white;margin-top: 0;"  class="user-info-dropdown">

				<div  style="color:white;position:absolute; top: 1.5rem; right: .75rem;" class="dropdown">
					<a style=" color:white;background-color: #4177d0;border-radius: 8px; padding: 10px;"class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span  style="color:white;"class="user-icon"><i style="color:white;line-height: 1.75rem;"class="fa fa-user-o"></i></span>
						<span   style="color:white; "class="user-name"><?php echo $row_usuario2['vendedor']?></span>
					</a>
					<div  style=" color:white; background-color:white" class="dropdown-menu dropdown-menu-right">
					
						<a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>