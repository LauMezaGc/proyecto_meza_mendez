<?php
	$session = session();
	$id = $session->get('id');
	$nombre = $session->get('nombre');
	$perfil = $session->get('perfil_id');
?>


	<nav class="navbar navbar-expand-lg bg-body-tertiary">
	  <div class="container-fluid">
	
		    	<a class="navbar-brand" href="inicio">CarpiJuegos</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="./inicio" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						    Pagina Principal
						  </a>
						  <ul class="dropdown-menu">
						    <li><a class="dropdown-item" href="./inicio#sobrenos">Sobre Nosotros</a></li>
						    <li><a class="dropdown-item" href="./inicio#quienessomos">Quienes Somos</a></li>
						    <li><a class="dropdown-item" href="./inicio#quehacemos">Que Hacemos</a></li>
						    <li><hr class="dropdown-divider"></li>
						    <li><a class="dropdown-item" href="./contacto">Contacto</a></li>
						  </ul>
						</li>

						<li class="nav-item">
				          <a class="nav-link" href="./inicio#quehacemos" role="button">
				            Juegos
				          </a>
				        </li>

				        <li class="nav-item">
				          <a class="nav-link" href="todos_p" role="button">
				            Catálogo
				          </a>
				        </li>

						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="./inicio/quehacemos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						    Ayuda
						  </a>
						  <ul class="dropdown-menu">
						  	<li><a class="dropdown-item" href="./contacto">Contacto</a></li>
						    <li><a class="dropdown-item" href="./soporte">Soporte Tecnico</a></li>
						    <li><a class="dropdown-item" href="./reembolso">Reembolsos</a></li>
						    <li><a class="dropdown-item" href="./politica">Política de Privacidad</a></li>
						    <li><a class="dropdown-item" href="./terminos">Terminos de uso</a></li>
						  </ul>
						</li>

					</ul>
					<ul class="navbar-nav  mb-2 mb-lg-0">
				
					<?php if($perfil == 1): ?>
			    	<!-- NAVBAR PARA ADMINISTRADORES -->	
		        		<li class="nav-item dropstart">
		        			<svg class="bi nav-item dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" width="32" height="32" fill="currentColor">
								<use xlink:href="assets/icons/bootstrap-icons.svg#person-fill-gear"/>
							</svg>
		        			<ul class="dropdown-menu">
							    <li>
							    	<div class="btn btn-info active btnUser btn-sm dropdown-item">
					    				ADMINISTRADOR: <?php echo $nombre; ?>
					    			</div>
							    </li>
							    <li><hr class="dropdown-divider"></li>
							    <li><a class="dropdown-item" href="usuarios">CRUD Usuarios</a></li>
							    <li><a class="dropdown-item" href="crear">CRUD Productos</a></li>
							    <li><a class="dropdown-item" href="ventas">Ventas</a></li>
							    <li><hr class="dropdown-divider"></li>
							    <li><a class="dropdown-item" href="contacto">Consultas</a></li>
							    <li><hr class="dropdown-divider"></li>
							    <li>
							    	<a class=" dropdown-item nav-link" href="./logout" role="button">
										Cerrar Sesión
									</a>
								</li>
							  </ul>
				        </li>
					<?php elseif($perfil == 2 ): ?>
			    	<!-- NAVBAR PARA CLIENTES LOGUEADOS -->
		    	        <li class="nav-item dropstart">
		        			<svg class="bi nav-item dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" width="32" height="32" fill="currentColor">
								<use xlink:href="assets/icons/bootstrap-icons.svg#person-fill"/>
							</svg>
		        			<ul class="dropdown-menu">
							    <li>
							    	<div class="btn btn-success active btnUser btn-sm dropdown-item">
					    				USUARIO: <?php echo $nombre; ?>
					    			</div>
							    </li>
							    <li><hr class="dropdown-divider"></li>
							    <li><a class="dropdown-item" href="muestro">Carrito</a></li>
							    <li><a class="dropdown-item" href="<?php echo base_url('ver_factura_usuario/' . $id)  ?>">Mis Compras</a></li>
							    <li><hr class="dropdown-divider"></li>
							    <li><a class="dropdown-item" href="ver-consultas">Consultas</a></li>
							    <li><hr class="dropdown-divider"></li>
							    <li>
							    	<a class=" dropdown-item nav-link" href="./logout" role="button">
										Cerrar Sesión
									</a>
								</li>
							  </ul>
				        </li>
					<?php else:?>
					<!-- NAVBAR SIN SESIÓN -->		
				        <li class="nav-item">
							<a class="nav-link" href="./login" role="button">
								Iniciar Sesión
							</a>
				        </li>
				     <?php endif;?>	    
					</ul>
			    </div>	
	  </div>
	</nav>


