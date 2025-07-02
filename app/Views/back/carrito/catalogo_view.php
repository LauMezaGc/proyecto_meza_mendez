<div class="container color">
	<div class="row">
		<div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->

		<div class="col"> <!-- COLUMNA CENTRAL GRID -->

			<div class="row">
				<div class="col-md-12">
					
					<?php if(!$producto) { ?>

						<div class="container-fluid">
							<div class="text-center">
								<h2>No hay productos</h2>
							</div>
						</div>

					<?php } else { ?>

						<div class="container-fluid mt-2 mb-3 text-center">
							<h2>Todos los productos</h2>
						</div>

						<div class="row">
							<?php foreach($producto as $row) { ?>
								<?php if ($row['eliminado'] != 'SI') { ?>
									<div class="col mt-5 mb-5">
										<img src="<?= base_url('assets/uploads/'. $row['imagen']) ?>" width="150px" height="150px">
							
										<?php if ($row['stock'] > 0 || $row['formato'] == 2) { ?>
											<?php echo form_open('carrito_agrega'); ?>
												<?php 
													echo form_hidden('id', $row['id']);
													echo form_hidden('precio', $row['precio']);
													echo form_hidden('nombre_prod', $row['nombre_prod']);

													$btn = array(
														'class' => 'btn btn-secondary fuenteBotones',
														'value' => 'Agregar al carrito',
														'name' => 'action'
													);
													echo form_submit($btn);
												?>
											<?php echo form_close(); ?>
										<?php }?>
									</div>
								<?php } ?>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>		

		