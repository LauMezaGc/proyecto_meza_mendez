<div class="container mt-1 mb-1 d-flex justify-content-center">
	<div class="card" style="width: 55%;">
		<div class="card-header text-center">
			<!-- Título -->
			<h2>Alta de Usuarios</h2>
		</div>
		<!-- Validación -->
		<?php if (!empty(session()->getFlashdata('fail'))): ?>
			<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
		<?php endif; ?>
		<?php if (!empty(session()->getFlashdata('success'))): ?>
			<div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
		<?php endif; ?>

		<?php $validation = \Config\Services::validation(); ?>
		<!-- Inicio del formulario -->
		<form action="<?= base_url('/crear-user'); ?>" method="post" enctype="multipart/form-data">
			<div class="card-body" media="(max-width:568px)">

				<div class="mb-2">
					<label for="nombre" class="form-label">Nombre</label>
					<input class="form-control" type="text" name="nombre" id="nombre" value="<?= set_value('nombre'); ?>" placeholder="Nombre del usuario" autofocus>
					<!-- Error -->
					<?php if ($validation->getError('nombre')): ?>
						<div class="alert alert-danger mt-2">
							<?= $validation->getError('nombre'); ?>
						</div>
					<?php endif; ?>
				</div>


				<div class="mb-2">
					<label for="apellido" class="form-label">Apellido</label>
					<input class="form-control" type="text" name="apellido" id="apellido" value="<?= set_value('apellido') ?>" placeholder="Apellido del usuario" autofocus>
					<!-- Error -->
					<?php if ($validation->getError('apellido')): ?>
						<div class="alert alert-danger mt-2">
							<?= $validation->getError('apellido'); ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="mb-2">
					<label for="descripcion" class="form-label">email</label>
					<input class="form-control" type="femail" name="email" id="descripcion" value="<?= set_value('email') ?>" placeholder="correo@algo.com" autofocus>
					<!-- Error -->
					<?php if ($validation->getError('email')): ?>
						<div class="alert alert-danger mt-2">
							<?= $validation->getError('email'); ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="mb-2">
					<label for="usuario" class="form-label">Usuario</label>
					<input class="form-control" type="text" name="usuario" id="usuario" value="<?= set_value('usuario') ?>" placeholder="Usuario" autofocus>
					<!-- Error -->
					<?php if ($validation->getError('usuario')): ?>
						<div class="alert alert-danger mt-2">
							<?= $validation->getError('usuario'); ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="mb-2">
					<label for="pass" class="form-label">Contraseña</label>
					<input class="form-control" type="password" name="pass" id="pass" value="<?= set_value('pass') ?>" placeholder="Contraseña" autofocus>
					<!-- Error -->
					<?php if ($validation->getError('pass')): ?>
						<div class="alert alert-danger mt-2">
							<?= $validation->getError('pass'); ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="mb-2">
					<label for="perfil_id" class="form-label">Tipo de usuario</label>
					<select class="form-control" name="perfil_id" id="perfil_id">
						<option value="0" hidden >Perfil</option>
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

				<!-- Botones -->
				<div class="form-group">
					<button type="submit" id="send_form" class="btn btn-primary">Guardar</button>
					<button type="reset" class="btn btn-danger">Limpiar</button>
					<a href="<?= base_url('/usuarios'); ?>" class="btn btn-secondary">Volver</a>
				</div>
			</div>
		</form> <!-- Fin del formulario -->
	</div>
</div>