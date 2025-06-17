<?php
	$session = session();
	$nombre = $session->get('nombre');
	$perfil = $session->get('perfil_id');
?>

<section class="container-fluid">
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid">
		    <a class="navbar-brand" href="#">CarpiJuegos</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>

		    <?php if($perfil == 1): ?>
		    	<!-- NAVBAR PARA ADMINISTRADORES -->	
		    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    		<div class="btn btn-info active btnUser btn-sm">
		    		<a href="#">ADMINISTRADOR: <?php echo session('nombre'); ?></a>
		    		</div>
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
		        
		        		<li class="nav-item dropdown">
		          			<a class="nav-link dropdown-toggle" href="./tienda" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            		Tienda
		          			</a>
		          			<ul class="dropdown-menu">
		            			<li><a class="dropdown-item" href="./tienda">Juegos Nuevos</a></li>
		            			<li><a class="dropdown-item" href="./tienda">Ofertas</a></li>
		            			<li><a class="dropdown-item" href="./tienda">Juegos fisicos</a></li>
		          			</ul>
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

		        		<li class="nav-item">
		          			<a class="nav-link" href="./inicio#quehacemos" role="button">
		            		Juegos
		          			</a>
		        		</li>

		        		<li class="nav-item">
		        			<a class="nav-link" href="./logout" role="button">Cerrar Sesión</a>
		        		</li>

		  
		      		</ul>
		    	</div>

		    <?php elseif($perfil == 2 ): ?>
		    	<!-- NAVBAR PARA CLIENTES LOGUEADOS -->	
		    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    		<div class="btn btn-info active btnUser btn-sm">
		    		<a href="">USUARIO: <?php echo session('nombre'); ?></a>
		    		</div>
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
		        
		        		<li class="nav-item dropdown">
		          			<a class="nav-link dropdown-toggle" href="./tienda" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            		Tienda
		          			</a>
		          			<ul class="dropdown-menu">
		            			<li><a class="dropdown-item" href="./tienda">Juegos Nuevos</a></li>
		            			<li><a class="dropdown-item" href="./tienda">Ofertas</a></li>
		            			<li><a class="dropdown-item" href="./tienda">Juegos fisicos</a></li>
		          			</ul>
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

		        		<li class="nav-item">
		          			<a class="nav-link" href="./inicio#quehacemos" role="button">
		            		Juegos
		          			</a>
		        		</li>

		        		<li class="nav-item">
		        			<a class="nav-link" href="./logout" role="button">Cerrar Sesión</a>
		        		</li>

		  
		      		</ul>
		    	</div>

			<?php else:?>
				<!-- NAVBAR SIN SESIÓN -->
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
		        
		        		<li class="nav-item dropdown">
		          			<a class="nav-link dropdown-toggle" href="./tienda" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            		Tienda
		          			</a>
		          			<ul class="dropdown-menu">
		            			<li><a class="dropdown-item" href="./tienda">Juegos Nuevos</a></li>
		            			<li><a class="dropdown-item" href="./tienda">Ofertas</a></li>
		            			<li><a class="dropdown-item" href="./tienda">Juegos fisicos</a></li>
		          			</ul>
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

		        		<li class="nav-item">
		          			<a class="nav-link" href="./inicio#quehacemos" role="button">
		            		Juegos
		          			</a>
		        		</li>

		        		<li class="nav-item">
		        			<a class="nav-link" href="./login" role="button">Iniciar Sesión</a>
		        		</li>

		  
		      		</ul>
		    	</div>
		    <?php endif;?>
	  	</div>
	</nav>
</section>
