	<div class=" container my-3 text-center"> 
		<?php if (empty($producto)): ?> 
			<h3>No hay productos cargados</h3> 
 		<?php endif; ?> 
 	</div> 

	<div class="container my-3">
		<?php if (!empty(session()->getFlashdata('fail'))): ?>
			<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
		<?php endif; ?>
		<?php if (!empty(session()->getFlashdata('success'))): ?>
			<div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
		<?php endif; ?>

		<h1>Productos Eliminados</h1>
		<div class="text-end" style="margin-bottom: 5px;">
			<a href="<?= base_url('/crear'); ?>" class="btn btn-success">Volver</a>
		</div>
		<table class="table table-hover table-dark table-responsive-md" id="users-list">
			<thead class="table-dark">
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
					<?php if ($prod['eliminado'] == 'SI'): ?>
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
								<a href="<?= base_url('/activar_prod/' . $prod['id']); ?>" class="btn btn-secondary">Activar</a>
							</th>
						</tr>
					<?php endif; ?>

				<?php endforeach;?>
			</tbody>
		</table>
	</div>
