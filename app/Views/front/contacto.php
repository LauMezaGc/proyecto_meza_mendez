<?php
	$session = session();
	$perfil = $session->get('perfil_id');
?>

<h1 class="text-" style="text-align: center; padding-top: 20px;">Contacto</h1>
<hr class="hr1" style="padding-bottom: 2px;">

<div id="contacto" class="row contact-container justify-content-center">

	<?php if($perfil == 1): ?>
	<!-- LISTA DE MENSAJES PARA ADMIN -->
		
		<!-- Mensaje de error -->
		<?php if(session()->getFlashdata('msg')):?>
			<div class="alert alert-warning">
				<?= session()->getFlashdata('msg')?>
			</div>
		<?php endif;?>
		<?php if(!empty (session()->getFlashdata('fail'))):?>
			<div class="alert alert-danger"><?session()->getFlashdata('fail');?></div>
		<?php endif?>
		<?php if(!empty (session()->getFlashdata('success'))):?>
			<div class="alert alert-success"><?=session()->getFlashdata('success');?></div>
		<?php endif?>


		<?php if(!empty($consultas)): 
		<div class="container">
			<div class="alert alert-dark text-center" role="alert">
				<h4 class="alert-heading">No hay consultas por antender</h4>
				<p>No hay consultas disponibles en este momento.</p>
				<hr>
				<p class="mb-0">Por favor, regrese mas tarde</p>
			</div>
		</div>
		<?php else:?>
		<div class="container-fluid">
			<h1 class="titulos-dark rounded-3 p-2 text-center">Consultas</h1>
			<div>
				<?php foreach ($consultas as $consulta) { ?>
					<form action="enviar-respuesta/<?php echo $consulta['id']?>" class="d-flex flex-column mb-3 rounded-3 m-2" id="<?php echo $consulta['id']?>">
					  <div class="p-2">
						<div class="hstack gap-3">
						  <div class="p-2">
						  	<svg class="bi nav-item dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" width="32" height="32" fill="currentColor">
								<use xlink:href="assets/icons/bootstrap-icons.svg#person-<?php if($perfil == 1):?>fill<?php else:?>exclamation"/>
							</svg>
						  </div>
						  <div class="p-2">
						  	<h4><?php echo $consulta['usuario_id.nombre'] . ' ' . $consulta['usuario_id.apellido']?></h4>
						  	<p>@<?php echo $consulta['usuario_id.usuario']?></p>
						  </div>
						  <div class="vr ms-auto"></div>
						  <div class="p-2"><p>#<?php echo $consulta['id']?></p></div>
						</div>
					  </div>
					  <div class="p-2"><h3><?php echo $consulta['asunto']?></h3></div>
					  <div class="p-2"><span><?php echo $consulta['mensaje']?></span></div>
					  <div class="p-2">
					  	<textarea name="respuesta"><?php echo $consulta['respuesta']?></textarea>
						<div class="btn-group" role="group">
						  <button type="submit" class="btn btn-primary">Enviar Respuesta</button>
						  <button type="reset" class="btn btn-danger">Limpiar</button>
						  <button type="submit" formaction="eliminar-consulta/<?php echo $consulta['id']?>" class="btn btn-warning">Eliminar Consulta</button>
						</div>
					  </div>
					</form>
				<?php } ?>

			</div>
		</div>
		<?php endif;?>






	<?php else:?>
	<div class="col contact-left">
		<h3>Informacion de Contacto</h3>
		<p><strong>Titulares de la Empresa:</strong> Federico Pelusa y Martin Soboreo</p>
		<p><strong>Razon Social:</strong> CarpiCompany.SRL</p>
		<p><strong>Domicilio Legal:</strong> San Luis 1401</p>
		<p><strong>Telefono:</strong> 3795123456</p>
		<p><strong>Mail de Contacto:</strong> carpijuegos_dev@gmail.com</p>
	</div>
	<form action="enviar-contacto" class="col contact-right">
		<div class="contact-right-title">
			<h2>Contactanos</h2>
			<hr>
		</div>
		<input type="text" name="asunto" placeholder="Asunto" class="contact-inputs" required>
		<textarea name="mensaje" placeholder="Escribe un mensaje..." class="contact-inputs" required></textarea>
		<div>
			<button type="submit" class="btn btn-primary">Enviar</button> <button type="reset" class="btn btn-danger">Limpiar</button>
		</div>
		<?php if($perfil == 2): ?>
			<!-- ALERTA USUARIO LOG -->
			<div class="rounded-4 bg-body-secondary text-dark-emphasis p-3o">
				<p>Recordatorio: todas las consultas que usted haga serán asociadas a su perfil. Para revisar sus consultas previas, <a href="ver-consultas">haga click aquí.</a></p>
			</div>
        <?php else:?>
        	<!-- ALERTA SIN SESIÓN -->
        	<div class="rounded-4 bg-body-secondary text-dark-emphasis p-3">
				<p>Recordatorio: No podra ver la respuesta a su consulta si no inicia sesión.</a></p>
			</div>
        <?php endif;?>
	</form>
	<?php endif;?>
</div>
				    