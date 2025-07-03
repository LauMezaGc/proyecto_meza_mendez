<div class="container color">
	<div class="row">
		<div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->

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
						<div class="container-fluid mt-2 mb-3 text-center">
							<h2>Todos los productos</h2>
						</div>

						<div class="row">
			    			<?php foreach($producto as $row): ?>
						        <?php if ($row['eliminado'] != 'SI'): ?>
						            <div class="col-md-3 text-center mb-4"> 

						            	<!-- Imagen -->
						                <img src="<?= base_url('assets/uploads/' . $row['imagen']) ?>" width="150px" height="150px">

						                <!-- Nombre del producto -->
						                <h5><?= $row['nombre_prod'] ?></h5>

						                <!-- Precio -->
						                <?= 'Precio: $', $row['precio'] ?>

						                <!-- Formato -->
						                <?php if ($row['formato'] == 1): ?>
						        			<?php if ($row['stock'] > 0): ?>
									            <div class="col text-center">
									                <?php echo 'Disponible: ', $row['stock'] ?>
									            </div>
								        	<?php else: ?>
									        	<div class="col text-center">
									                <?php echo 'No hay Stock' ?>
									            </div>
								        	<?php endif; ?>

						        		<?php else: ?>
							        		<div class="col text-center">
							        			<?php echo 'Digital' ?>
							        		</div>
						        		<?php endif; ?>

						        		<!-- Botones -->
						        		<?php if ($row['stock'] > 0 || $row['formato'] == 2): ?>
											<div class="col text-center">
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
										<?php endif; ?>

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
