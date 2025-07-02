<!-- Mensaje de error -->
<?php if(session()->getFlashdata('msg')):?>
	<div class="alert alert-warning">
		<?= session()->getFlashdata('msg')?>
	</div>
<?php endif;?>
<?php if(!empty (session()->getFlashdata('fail'))):?>
	<div class="alert alert-danger"><?session()->getFlashdata('fail');?></div>
<?php endif?>
<?php if(!empty (session()->getFlashdata('success'))):?>
	<div class="alert alert-success"><?=session()->getFlashdata('success');?></div>
<?php endif?>


<?php if(!empty($consultas)): ?>
<div class="container">
	<div class="alert alert-dark text-center" role="alert">
		<h4 class="alert-heading">No hay consultas para listar</h4>
		<p>No ha hecho consultas o no el servicio de consultas no esta disponible en este momento.</p>
		<hr>
		<p class="mb-0">Por favor, regrese mas tarde o haga una consulta.</p>
	</div>
</div>
<?php else:?>
<div class="container-fluid">
	<h1 class="titulos-dark rounded-3 p-2 text-center">Consultas Hechas</h1>
	<div>
		<?php foreach ($consultas as $consulta) { ?>
				<div class="d-flex flex-column mb-3 rounded-3 m-2" id="<?php echo $consulta['id']?>">
				  <div class="p-2">
					<div class="hstack gap-3">
					  <div class="p-2"><p>#<?php echo $consulta['id']?></p></div>
					</div>
				  </div>
				  <div class="p-2"><h3><?php echo $consulta['asunto']?></h3></div>
				  <div class="p-2"><span><?php echo $consulta['mensaje']?></span></div>
				  <div class="p-2">
				  	<span><?php echo $consulta['respuesta']?></span>
				  </div>
				</div>
		<?php } ?>
	</div>
</div>
<?php endif;?>