<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>TravelSyst - Perfil</title>
	</head>
	<body>
		Estos son sus datos.<br><br>
		<?php
			echo "Usuario: ".$username;
			echo "Password: ".$password;
			echo "<br><br>";
			echo "Nombre: ".$name;
			echo "Apellido P: ".$lastname_f;
			echo "Apellido M: ".$lastname_m;
			echo "País: ".$country_name;
			echo "Mail: ".$mail;
			echo "Sexo: ".$sex_name;
			echo "Fecha Nac: ".$birth_date;
			echo "Fecha Ingreso".$birth_date;
			echo "<br><br>";

			echo form_open('User/changePass');
			echo form_hidden('id',$id);
			echo form_label('Nuevo Password', 'pass')."\n";
			echo form_password('password')."\n"."<br>";
			echo form_submit('send', 'Cambiar Password');
			echo form_close();
		?>
	</body>
</html>