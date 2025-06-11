<div class="container color">
	<div class="row">
		<div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->

		<div class="col"> <!-- COLUMNA CENTRAL GRID -->

			<div class="row">
				<div class="col-md-12">
					<!-- todavia no hay productos -->
					<?php
					$producto = 3;	
					?>
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
					
					<?php } ?>
				
				</div>
			</div>
		</div>
	</div>
</div>				