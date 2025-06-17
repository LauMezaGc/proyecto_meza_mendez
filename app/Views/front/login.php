<main>
	<div class="container pt-5 mt-4 mb-5">
		<div class="card-header text-justify">
			<div class="row d-flex justify-content-center">

				<h1>Iniciar Sesión</h1>

				<!-- Mensaje de error -->
				<?php if(session()->getFlashdata('msg')):?>
					<div class="alert alert-warning">
						<?= session()->getFlashdata('msg')?>
					</div>
				<?php endif;?>

				<!-- Formulario login -->
				<form method="post" action="<?php echo base_url('/enviar-login') ?>">
					<div class="card-body" media="(max-width:768px)">
						<div class="mb-2">
							<label for="exampleFormControlInput1" class="forml-label">Correo</label>
							<input name= "email" type="text" class="form-control" placeholder="Correo"> 
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="forml-label">Contraseña</label>
							<input name= "pass" type="password" class="form-control" placeholder="Contraseña"> 
						</div>

						<input type="submit" value="Ingresar" class="btn btn-primary">
						<p>¿No esta registrado? <a href="./registro" class="text-success">Entre aquí.</a></p>

					</div>
				</form>

			</div>
		</div>
	</div>
</main>	