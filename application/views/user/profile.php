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

			echo "Modificar datos:<br><br>";

			echo form_open('User/changeField');
			echo form_hidden('id',$id);
			echo form_hidden('field','username');
			echo form_label('Nuevo Username', 'user')."\n";
			echo form_input('value')."\n";
			echo form_submit('send', 'Cambiar');
			echo form_close();

			echo form_open('User/changeField');
			echo form_hidden('id',$id);
			echo form_hidden('field','password');
			echo form_label('Nuevo Password: ', 'pass')."\n";
			echo form_password('value')."\n";
			echo form_submit('send', 'Cambiar');
			echo form_close();

			echo form_open('User/changeField');
			echo form_hidden('id',$id);
			echo form_hidden('field','name');
			echo form_label('Nuevo Nombre: ', 'name')."\n";
			echo form_input('value')."\n";
			echo form_submit('send', 'Cambiar');
			echo form_close();

			echo form_open('User/changeField');
			echo form_hidden('id',$id);
			echo form_hidden('field','lastname_f');
			echo form_label('Nuevo Apellido P: ', 'lnamef')."\n";
			echo form_input('value')."\n";
			echo form_submit('send', 'Cambiar');
			echo form_close();

			echo form_open('User/changeField');
			echo form_hidden('id',$id);
			echo form_hidden('field','lastname_m');
			echo form_label('Nuevo Apellido M: ', 'lnamem')."\n";
			echo form_input('value')."\n";
			echo form_submit('send', 'Cambiar');
			echo form_close();

			echo form_open('User/changeField');
			echo form_hidden('id',$id);
			echo form_hidden('field','country_id');
			echo form_label('Nuevo País: ', 'country')."\n";
			echo form_dropdown('value', $country_option, $country_option['1']);
			echo form_submit('send', 'Cambiar');
			echo form_close();

			echo form_open('User/changeField');
			echo form_hidden('id',$id);
			echo form_hidden('field','mail');
			echo form_label('Nuevo Mail: ', 'mail')."\n";
			echo form_input('value')."\n";
			echo form_submit('send', 'Cambiar');
			echo form_close();

			echo form_open('User/changeField');
			echo form_hidden('id',$id);
			echo form_hidden('field','sex_id');
			echo form_label('Nuevo Sexo: ', 'sex')."\n";
			echo form_dropdown('value', $sexes_option, $sexes_option['1']);
			echo form_submit('send', 'Cambiar');
			echo form_close();

			echo form_open('User/changeField');
			echo form_hidden('id',$id);
			echo form_hidden('field','birth_date');
			echo form_label('Nueva Fecha Nac: ', 'birth')."\n";
			echo form_input(array('class' => 'form-control datepicker' ,'name' => 'value'))."\n"."<br>";
			echo form_submit('send', 'Cambiar');
			echo form_close();
		?>

	<script>
    $(document).ready(function(){      
      $('.datepicker').datepicker({format : 'yyyy/mm/dd'});
      $('.select-2').select2();    
    });
  	</script>
