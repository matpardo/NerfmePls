<?php
	if(isset($error) && $error == TRUE){ ?>
		<p class="bg-danger"> 
			<?php echo (isset($message))? $message : "El usuario no ha sido encontrado."; ?>
		</p>
<?php	}
?>
<div class="row">
	<?php echo form_open('User/checkLogin')."\n"; ?>
	<div class="col-sm-6 col-sm-offset-3">
		<h2>Iniciar Sesión</h2>
		<div class="group-control">
			<?php echo form_label('Usuario', 'usuario')."\n"; ?>
			<?php echo form_input(array('class' => 'form-control','name' => 'username'))."\n"; ?>			
		</div>	
		<br>
		<div class="group-control">
			<?php echo form_label('Contraseña', 'pass')."\n"; ?>
			<?php echo form_password(array('class' => 'form-control','name' => 'password'))."\n"; ?>			
		</div>
		<br>
		<div class="row">
			<div class="col-sm-10">
				<?php echo form_submit(array('value' => 'Iniciar Sesión','name' =>'send','class' => 'btn btn-info' ) ); ?>
				<?php echo form_close(); ?>			
			</div>
			<div class="col-sm-2">
				<?php echo anchor('User/register', 'Registrar'); ?>			
			</div>				
		</div>
	
	
	</div>

</div>		
		


	
