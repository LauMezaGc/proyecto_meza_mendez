<?php 
	$session = session();
	$id = session()->get('id');
?>

<div class="container mt-4">
	<div class="d-flex justify-content-end">
		<a href="<?php echo site_url('/user-form') ?>" class="btn btn-success mb-2">Agregar Usuarios</a>
	</div>
	<?php
		if(isset($_session['msg'])) {
			echo $_session['msg'];
		}
	?>
	<div class="mt-2">
		<table class="table table-bordered table-secondary table-hover" id="users-list">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Perfil</th>
					<th>Baja</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php if($users): ?>
					<?php foreach($users as $user): ?>
						<tr>
							<td><?php echo $user['id']; ?></td>
							<td><?php echo $user['nombre']; ?></td>
							<td><?php echo $user['email']; ?></td>
							<td><?php echo $user['perfil_id']; ?></td>
							<td><?php echo $user['baja']; ?></td>
							<td>	
								<a href="<?php echo base_url('editar-user/' . $user['id']); ?>" class="btn btn-primary btn-sm">Editar</a>
								<?php if ($id != $user['id']): ?>
									<a href="<?php echo base_url('borrar-user/' . $user['id']); ?>" class="btn btn-danger btn-sm">Borrar</a>
									<a href="<?php echo base_url('activar-user/' . $user['id']); ?>" class="btn btn-secondary btn-sm">Activar</a>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div> 
</div>
