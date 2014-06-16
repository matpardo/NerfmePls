<?php
	if(isset($error)){
		echo "<b>";
		switch($error){
			case 0:
				echo "Registro completado exitosamente.";
				break;
			case 1:
				echo "Error: Solicitud incorrecta.";
				break;
			case 2:
				echo "Error: El nombre de usuario ya existe.";
				break;
			case 3:
				echo "Error: El mail ya ha sido registrado.";
				break;
			case 4:
				echo "Error: No se ha realizado inserción correctamente.";
				break;
			default:
				echo "Unexpected error";
		}
		echo "</b><br><br>";
	}
?>
	Complete el siguiente formulario de registro.<br><br>
	<?php  echo form_open('User/checkRegister')."\n"; ?>
	<?php  echo form_hidden('group_id','2'); ?>
	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-6">
					<?php  echo form_label('Usuario', 'usuario')."\n"; ?>
					<?php  echo form_input(array('class' =>'form-control' ,'name' => 'username'))."\n"."<br>"; ?>					
				</div>
				<div class="col-sm-6">
					<?php  echo form_label('Password', 'pass')."\n"; ?>
					<?php  echo form_password(array('class' =>'form-control' ,'name' => 'password'))."\n"."<br>"; ?>					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<?php  echo form_label('E-mail', 'mail')."\n"; ?>
					<?php  echo form_input(array('class' =>'form-control' ,'name' => 'mail'))."\n"."<br>"; ?>							
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<?php  echo form_label('País', 'country')."\n"; ?>
					<?php  echo form_dropdown('country_id', $country_option, $country_option['1'],'class = "input-xl select-2"')."<br>"; ?>					
				</div>
				<div class="col-sm-6">
					<?php  echo form_label('Sexo', 'sex')."\n"; ?>
					<?php  echo form_dropdown('sex_id', $sexes_option, $sexes_option['1'],'class = "select-2"')."<br>"; ?>					
				</div>
			</div>
			
		</div>
		<div class="col-sm-5">
			<div class="row">
				<div class="col-sm-12">
					<?php  echo form_label('Nombre', 'name')."\n"; ?>
					<?php  echo form_input(array('class' => 'form-control' ,'name' => 'name'))."\n"."<br>"; ?>					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<?php  echo form_label('Apellido Paterno', 'lastname_f')."\n"; ?>
					<?php  echo form_input(array('class' => 'form-control' ,'name' => 'lastname_f'))."\n"."<br>"; ?>					
				</div>
				<div class="col-sm-6">
					<?php  echo form_label('Apellido Materno', 'lastname_m')."\n"; ?>
					<?php  echo form_input(array('class' => 'form-control' ,'name' => 'lastname_m'))."\n"."<br>"; ?>					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<?php  echo form_label('Fecha de nacimiento', 'birth_date')."\n"; ?>
					<?php  echo form_input(array('class' => 'form-control datepicker' ,'name' => 'birth_date'))."\n"."<br>"; ?>					
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<?php  echo form_submit(array('value' => 'Registrar','class' =>'btn btn-info')); ?>
			<?php  echo form_close(); ?>			
		</div>
		<div class="col-sm-4">
			<?php  echo anchor('/user/', 'Ir a login'); ?>
			
		</div>
	</div>

	

	<script>
    $(document).ready(function(){      
      $('.datepicker').datepicker({format : 'yyyy/mm/dd'});
      $('.select-2').select2();    
    });
  	</script>


