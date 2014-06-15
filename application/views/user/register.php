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
			echo form_label('Usuario', 'usuario')."\n";
			echo form_input('username')."\n";
			echo form_label('Password', 'pass')."\n";
			echo form_password('password')."\n";
		
	
			echo form_submit('send', 'Log in');
			echo form_close();

			echo "<br>";
			echo anchor('User/register', 'Registrar');
		?>
	</body>
</html>