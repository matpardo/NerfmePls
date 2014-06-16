<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>TravelSyst - Perfil</title>
	</head>
	<body>
		Estos son sus datos.<br><br>
		<?php
			echo "<b>Usuario:</b> ".$username."<br>";
			echo "<b>Password:</b> ".$password."<br>";
			echo "<br><br>";
			echo "<b>Nombre:</b> ".$name."<br>";
			echo "<b>Apellido P:</b> ".$lastname_f."<br>";
			echo "<b>Apellido M:</b> ".$lastname_m."<br>";
			echo "<b>País:</b> ".$country_name."<br>";
			echo "<b>Mail:</b> ".$mail."<br>";
			echo "<b>Sexo:</b> ".$sex_name."<br>";
			echo "<b>Fecha Nac:</b> ".$birth_date."<br>";
			echo "<b>Fecha Ingreso:</b> ".$birth_date."<br>";
			echo "<br><br>";

			echo form_open('User/changePass');
			echo form_hidden('id',$id);
			echo form_label('Nuevo Password', 'pass')."\n";
			echo form_password('password')."\n";
			echo form_submit('send', 'Cambiar Password');
			echo form_close();
		?>
	</body>
</html>