	<div class="container my-3">
		<table class="table table-hover table-dark table-responsive-md">
			<thead class="table-dark">
				<div class="text-end" style="margin-bottom: 5px;">
					<a href="<?= base_url('/produ-form'); ?>" class="btn btn-success">Agregar</a>
					<a href="<?= base_url('/eliminados'); ?>" class="btn btn-danger">Eliminados</a>
				</div>
				<tr>
					<th>ID</th>
					<th>Producto</th>
					<th>Precio</th>
					<th>Formato</th>
					<th>Stock</th>
					<th>Imagen</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($producto as $prod): ?>
					<tr>
						<th><?php echo $prod['id'] ?></th>
						<th><?php echo $prod['nombre_prod'] ?></th>
						<th><?php echo $prod['precio'] ?></th>

						<?php if ($prod['formato'] == 1): ?>
							<th>Físico</th>
						<?php else: ?>
							<th>Digital</th>
						<?php endif; ?>

						<th><?php echo $prod['stock'] ?></th>
						<th><img src="<?= base_url('assets/uploads/' . $prod['imagen']) ?>" width="100px" height="100px" > </th>
						<th>
							<a href="<?= base_url('/editar/' . $prod['id']); ?>" class="btn btn-primary">Editar</a>
							<a href="<?= base_url('/borrar/' . $prod['id']); ?>" class="btn btn-secondary">Borrar</a>
						</th>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
