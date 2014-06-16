<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>TravelSyst - Administrar</title>
	</head>
	<body>
		Seleccione una acción.<br><br>
		<?php
			echo form_open('User/upgradeTraveler');
			echo form_label('<b>Ascender a Admin:</b> ', 'upgrade')."\n";
			echo form_dropdown('id', $travelers_option, array_values($travelers_option)[0]);
			echo form_submit('send', 'Ascender');
			echo form_close();

			echo form_open('User/banTraveler');
			echo form_label('<b>Banear Usuario:</b> ', 'ban')."\n";
			echo form_dropdown('id', $travelers_option, array_values($travelers_option)[0]);
			echo form_submit('send', 'Banear');
			echo form_close();
		?>
	</body>
</html>