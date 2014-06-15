<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>TravelSyst - Login</title>
	</head>
	<body>
		<?php
			if(isset($error) && $error == TRUE){
				echo "El usuario no ha sido encontrado.<br>";
			}
		?>
		Logueese por favor.<br><br>
		<?php
			echo form_open('User/checkLogin')."\n";
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


	
