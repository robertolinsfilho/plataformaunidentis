<style>
	.brand-logo{
	height:92px
		
	}
	</style>

<?php


session_status() == '2'? '' : session_start();
if($_SESSION['usuario'] === 'vendedor'){

?>


	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index">
				<img src="https://unidentisdigital.com.br/assets/img/LOGO.png" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="index" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">Home</span>
						</a>
						
					</li>
					<li>
						<a href="propostas" class="dropdown-toggle no-arrow">
							<span class="fa fa-plus"></span><span class="mtext">Incluir Proposta</span>
						</a>

					</li>
					<li>
						<a href="link" class="dropdown-toggle no-arrow">
							<span class="fa fa-link"></span><span class="mtext">Link</span>
						</a>

					</li>

					

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-table"></span><span class="mtext">Propostas</span>
						</a>
						<ul class="submenu">
							<li><a href="datatable">Geral</a></li>
							<li><a href="indeferidas">Indeferidas</a></li>
							<li><a href="averbacao">Em Averbação</a></li>
							<li><a href="analise">Em Analise</a></li>
							<li><a href="canceladas">Canceladas</a></li>
							<li><a href="implantadas">Implantadas</a></li>
							<li><a href="pendente">Pag Pendente</a></li>
							<li><a href="nova">Novas</a></li>
						</ul>
					</li>
					
				
					
					
					
					
					<li>
						<a href="dependentes" class="dropdown-toggle no-arrow">
							<span class="icon-copy fa fa-address-card-o"></span><span class="mtext">Gestão de Dependentes</span>
						</a>
					</li>
					<li>
					<a class="dropdown-toggle no-arrow" href="logout">
					<span class="fa fa-sign-out"></span><span class="mtext">Sair</span>
					</a>
					</li>	
				</ul>
			</div>
		</div>
	</div>

	<?php
}elseif($_SESSION['usuario'] ==='cadastro@s4e.com.br'){
	?>

<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="https://unidentisdigital.com.br/assets/img/LOGO.png" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="index" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">Home</span>
						</a>

					</li>
				
				

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-table"></span><span class="mtext">Propostas</span>
						</a>
						<ul class="submenu">
							<li><a href="datatable">Geral</a></li>
							<li><a href="indeferidas">Indeferidas</a></li>
							<li><a href="averbacao">Em Averbação</a></li>
							<li><a href="analise">Em Analise</a></li>
							<li><a href="canceladas">Canceladas</a></li>
							<li><a href="implantadas">Implantadas</a></li>
							<li><a href="pendente">Pag Pendente</a></li>
							<li><a href="nova">Novas</a></li>

						</ul>
					</li>






					<li>
						<a href="dependentes" class="dropdown-toggle no-arrow">
							<span class="icon-copy fa fa-address-card-o"></span><span class="mtext">Gestão de Dependentes</span>
						</a>
					</li>
					<li>
					<a class="dropdown-toggle no-arrow" href="logout">
					<span class="fa fa-sign-out"></span><span class="mtext">Sair</span>
					</a>
					</li>	
				</ul>
			</div>
		</div>
	</div>











	<?php
	
	}elseif($_SESSION['usuario'] ==='corretora'){
		?>
	
	<div class="left-side-bar">
			<div class="brand-logo">
				<a href="index.php">
					<img src="https://unidentisdigital.com.br/assets/img/LOGO.png" alt="">
				</a>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li>
							<a href="index" class="dropdown-toggle no-arrow">
								<span class="fa fa-home"></span><span class="mtext">Home</span>
							</a>
	
						</li>
						
						
	
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="fa fa-table"></span><span class="mtext">Propostas</span>
							</a>
							<ul class="submenu">
								<li><a href="datatable">Geral</a></li>
								<li><a href="indeferidas">Indeferidas</a></li>
								
								<li><a href="analise">Em Analise</a></li>
								<li><a href="canceladas">Canceladas</a></li>
								<li><a href="implantadas">Implantadas</a></li>
								
	
							</ul>
						</li>

	
	
	
	
	
	

						<li>
					<a class="dropdown-toggle no-arrow" href="logout">
					<span class="fa fa-sign-out"></span><span class="mtext">Sair</span>
					</a>
					</li>	
					</ul>
				</div>
			</div>
		</div>
	
	
	
	
	
	
	
	
	
	
	
		<?php
}else{


	?>

<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="https://unidentisdigital.com.br/assets/img/LOGO.png" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="index" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">Home</span>
						</a>

					</li>
					<li>
						<a href="propostas" class="dropdown-toggle no-arrow">
							<span class="fa fa-plus"></span><span class="mtext">Incluir Proposta</span>
						</a>

					</li>
					<li>
						<a href="link" class="dropdown-toggle no-arrow">
							<span class="fa fa-link""></span><span class="mtext">Link</span>
						</a>

					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-table"></span><span class="mtext">Propostas</span>
						</a>
						<ul class="submenu">
							<li><a href="datatable">Geral</a></li>
							<li><a href="indeferidas">Indeferidas</a></li>
							<li><a href="averbacao">Em Averbação</a></li>
							<li><a href="analise">Em Analise</a></li>
							<li><a href="canceladas">Canceladas</a></li>
							<li><a href="implantadas">Implantadas</a></li>
							<li><a href="pendente">Pag Pendente</a></li>
							<li><a href="nova">Novas</a></li>

						</ul>
					</li>






					<li>
						<a href="dependentes" class="dropdown-toggle no-arrow">
							<span class="icon-copy fa fa-address-card-o"></span><span class="mtext">Gestão de Dependentes</span>
						</a>
					</li>
					<li>
					<a class="dropdown-toggle no-arrow" href="logout">
					<span class="fa fa-sign-out"></span><span class="mtext">Sair</span>
					</a>
					</li>	
				</ul>
			</div>
		</div>
	</div>






<?php
}
?>