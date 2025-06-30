<?php
	$session = session();
	$id = $session->get('id');
?>

<div class="container mt-1 mb-1 d-flex justify-content-center">
	<div class="card" style="width: 55%;">
		<div class="card-header text-center">

			<!-- Título -->
			<h2>Editar Usuario</h2>
		</div>
		
		<?php if (!empty(session()->getFlashdata('fail'))): ?>
			<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
		<?php endif; ?>
		<?php if (!empty(session()->getFlashdata('success'))): ?>
			<div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
		<?php endif; ?>

		<?php $validation = \Config\Services::validation(); ?>

		<!-- Inicio del formulario -->
		<form action="<?= base_url('/update/' . $user_obj['id']); ?>" method="post" enctype="multipart/form-data">
			<div class="card-body" media="(max-width:568px)">

				<div class="mb-2">
					<label for="nombre" class="form-label">Nombre</label>
					<input class="form-control" type="text" name="nombre" id="nombre" value="<?= 
					$user_obj['nombre']; ?>" autofocus>
					<!-- Error -->
					<?php if ($validation->getError('nombre')): ?>
						<div class="alert alert-danger mt-2">
							<?= $validation->getError('nombre'); ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="mb-2">
					<label for="apellido" class="form-label">Apellido</label>
					<input class="form-control" type="text" name="apellido" id="apellido" value="<?=    $user_obj['apellido']; ?>" autofocus>
					<!-- Error -->
					<?php if ($validation->getError('apellido')): ?>
						<div class="alert alert-danger mt-2">
							<?= $validation->getError('apellido'); ?>
						</div>
					<?php endif; ?>
				</div>

 				<div class="mb-2">
					<label for="email" class="form-label">email</label>
					<input class="form-control" type="text" name="email" id="email" value="<?= 
					$user_obj['email'] ?>" autofocus>
					<!-- Error -->
					<?php if ($validation->getError('email')): ?>
						<div class="alert alert-danger mt-2">
							<?= $validation->getError('email'); ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="mb-2">
					<label for="usuario" class="form-label">Usuario</label>
					<input class="form-control" type="text" name="usuario" id="usuario" value="<?= $user_obj['usuario'] ?>" autofocus>
					<!-- Error -->
					<?php if ($validation->getError('usuario')): ?>
						<div class="alert alert-danger mt-2">
							<?= $validation->getError('usuario'); ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="mb-2">
					<label for="pass" class="form-label">Contraseña</label>
					<input class="form-control" type="password" name="pass" id="pass" value="<?= $user_obj['pass'] ?>" placeholder="Cambiar contraseña..." autofocus>
					<!-- Error -->
					<?php if ($validation->getError('pass')): ?>
						<div class="alert alert-danger mt-2">
							<?= $validation->getError('pass'); ?>
						</div>
					<?php endif; ?>
				</div>

				<?php if ($id != $user_obj['id']): ?>
					<div class="mb-2">
						<label for="perfil_id" class="form-label">Tipo de usuario</label>
						<select class="form-control" name="perfil_id" id="perfil_id">
							<option value="<?= $user_obj['perfil_id'] ?>" hidden >
								<?php foreach ($perfiles as $perfil_id): ?>
									<?php if ($perfil_id['id'] == $user_obj['perfil_id']): ?>
										<?php echo $perfil_id['descripcion'] ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</option>
							<?php foreach ($perfiles as $perfil_id): ?>
								<option value="<?= $perfil_id['id']; ?>" <?= set_select('perfil_id', $perfil_id['id']); ?>>
								<?= $perfil_id['descripcion']; ?>
								</option>
							<?php endforeach; ?>
						</select>
						<!-- Error -->
						<?php if ($validation->getError('perfil_id')): ?>
							<div class="alert alert-danger mt-2">
								<?= $validation->getError('perfil_id'); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<!-- Botones -->
				<div class="form-group">
					<button type="submit" id="send_form" class="btn btn-primary">Guardar</button>
					<button type="reset" class="btn btn-danger">Restaurar</button>
					<a href="<?= base_url('/usuarios'); ?>" class="btn btn-secondary">Volver</a>
				</div>
			</div>
		</form> <!-- Fin del formulario -->
	</div>
</div>