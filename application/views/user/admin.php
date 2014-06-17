
<div class="row">

	<div class="col-sm-6 col-sm-offset-3">
		<h3>Seleccione una acción</h3><br>
	
<?php if (empty($travelers_option)): ?>
	<h2>No hay usuarios viajeros para administrar</h2>
	
<?php else: ?>
		<?php echo form_open('User/upgradeTraveler'); ?>
		<?php echo form_label('<b>Ascender a Admin:</b> ', 'upgrade')."\n"; ?>
		<?php echo form_dropdown('id', $travelers_option, array_values($travelers_option)[0],'class = "sel-2 form-control"'); ?>
		<br><br>
		<?php echo form_submit(array('value' => 'Ascender','class' => 'btn btn-info')); ?>
		<?php echo form_close(); ?>
		<br>
		<?php echo form_open('User/banTraveler'); ?>
		<?php echo form_label('<b>Banear Usuario:</b> ', 'ban')."\n"; ?>
		<?php echo form_dropdown('id', $travelers_option, array_values($travelers_option)[0],'class = "sel-2 form-control"'); ?>
		<br>
		<?php echo form_submit(array('value' => 'Banear','class' => 'btn btn-danger')); ?>
		<?php echo form_close(); ?>
		
	</div>
</div>
<?php endif ?>

<script>
	$(document).ready(function(){
		$('.sel-2').select2();
	});
</script>