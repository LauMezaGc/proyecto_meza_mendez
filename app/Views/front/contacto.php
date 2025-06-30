<?php
	$session = session();
	$nombre = $session->get('nombre');
	$perfil = $session->get('perfil_id');
?>

<h1 class="text-" style="text-align: center; padding-top: 20px;">Contacto</h1>
<hr class="hr1" style="padding-bottom: 2px;">

<div id="contacto" class="row contact-container justify-content-center">

	<?php if($perfil == 1): ?>
	<!-- LISTA DE MENSAJES PARA ADMIN -->	
		







	<?php else:?>
	<div class="col contact-left">
		<h3>Informacion de Contacto</h3>
		<p><strong>Titulares de la Empresa:</strong> Federico Pelusa y Martin Soboreo</p>
		<p><strong>Razon Social:</strong> CarpiCompany.SRL</p>
		<p><strong>Domicilio Legal:</strong> San Luis 1401</p>
		<p><strong>Telefono:</strong> 3795123456</p>
		<p><strong>Mail de Contacto:</strong> carpijuegos_dev@gmail.com</p>
	</div>
	<form action="" class="col contact-right">
		<div class="contact-right-title">
			<h2>Contactanos</h2>
			<hr>
		</div>
		<input type="text" name="name" placeholder="Asunto" class="contact-inputs" required>
		<textarea name="message" placeholder="Escribe un mensaje..." class="contact-inputs" required></textarea>
		<div>
			<button type="submit" class="btn btn-primary">Enviar</button> <button type="reset" class="btn btn-danger">Limpiar</button>
		</div>
		<?php if($perfil == 2): ?>
			<!-- ALERTA USUARIO LOG -->
			<div class="rounded-4 bg-body-secondary text-dark-emphasis p-3o">
				<p>Recordatorio: todas las consultas que usted haga serán asociadas a su perfil. Para revisar sus consultas previas, <a href="usuario-consultas">haga click aquí.</a></p>
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
				    