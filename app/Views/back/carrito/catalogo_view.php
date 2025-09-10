<div class="container color">
	<div class="row">
		<div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->
			<form method="get" action="<?= base_url('catalogo-filtrado') ?>" class="mb-4 d-flex gap-2 flex-wrap">
        
		        <select class="form-control" name="formato" id="formato" onchange="this.form.submit()">
						<option value="<?= set_value('formato') ?>" hidden>Seleccionar Formato</option>
							<option value="1">Físico</option>
							<option value="2">Digital</option>
							<option value="3">Sin Filtro</option>
					</select>
			</form>
		<div class="col"> <!-- COLUMNA CENTRAL GRID -->

			<div class="row">
				<div class="col-md-12">
					
					<?php if(!$producto): ?>

						<div class="container-fluid">
							<div class="text-center">
								<h2>No hay productos</h2>
							</div>
						</div>
					<?php else: ?>
						<div class="container-fluid mt-3 mb-3 text-center">
							<h2>Nuestro Catálogo</h2>
						</div>

						<div class="row justify-content-center mt-5">

							<?php foreach ($producto as $row): ?>

								<?php if (($row['eliminado'] != 'SI') && ($row['stock'] > 0 || $row['formato'] == 2)) : ?>
									<div class="col-md-3  mb-4 d-flex">
										<div class="card card-hover w-100 h-100">
											<img src="<?= base_url('assets/uploads/' . $row['imagen']) ?>" class="card-img-top" alt="<?= $row['nombre_prod'] ?>">
										  	<div class="card-body d-flex flex-column justify-content-between ">
										    	<h5 class="card-title"><?= $row['nombre_prod'] ?></h5>
										    	<p class="card-text"><?= '$', $row['precio'] ?>

										    		<?php if ($row['formato'] == 1): ?>
										    			<span style="float: right; color: green;">
									                		<strong>Físico</strong>
									                	</span>

								        			<?php else: ?>								     
									                	<span style="float: right; color: blue;">
									                		<strong>Digital</strong>
									                	</span>

									            	<?php endif; ?>
										    	</p>
										    	<?php echo form_open('carrito_add'); ?>
													<?php 
														echo form_hidden('id', $row['id']);
														echo form_hidden('precio', $row['precio']);
														echo form_hidden('nombre_prod', $row['nombre_prod']);
														echo form_hidden('imagen', $row['imagen']);
																	
														$btn = array(
															'class' => 'btn btn-secondary',
															'value' => 'Agregar al carrito',
															'name' => 'action'
														);

														echo form_submit($btn);
													?> 
												<?php echo form_close(); ?>
											</div>
										</div>
									</div>

								<?php endif; ?>

							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
