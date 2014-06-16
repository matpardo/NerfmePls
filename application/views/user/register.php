<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>TravelSyst - Register</title>
	</head>
	<body>
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
		<?php
			echo form_open('User/checkRegister')."\n";
			echo form_hidden('group_id','2');
			echo form_label('Usuario', 'usuario')."\n";
			echo form_input('username')."\n"."<br>";
			echo form_label('Password', 'pass')."\n";
			echo form_password('password')."\n"."<br>";
			echo form_label('Nombre', 'name')."\n";
			echo form_input('name')."\n"."<br>";
			echo form_label('Apellido Paterno', 'lastname_f')."\n";
			echo form_input('lastname_f')."\n"."<br>";
			echo form_label('Apellido Materno', 'lastname_m')."\n";
			echo form_input('lastname_m')."\n"."<br>";
			echo form_label('Sexo', 'sex')."\n";
			echo form_dropdown('sex_id', $sexes_option, $sexes_option['1'])."<br>";
			echo form_label('País', 'country')."\n";
			echo form_dropdown('country_id', $country_option, $country_option['1'])."<br>";
			echo form_label('E-mail', 'mail')."\n";
			echo form_input('mail')."\n"."<br>";
			
			echo form_submit('send', 'Registrar');
			echo form_close();

			echo "<br>";
			echo anchor('User/login', 'Ir a login');
		?>
	</body>
</html>