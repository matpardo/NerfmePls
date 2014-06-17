<div class="panel panel-info">
  <div class="panel-heading"><h2>Estos son sus datos:</h2>    </div>
  <div class="panel-body">	
	<div class="row">
		<div class="col-sm-6">
			<table class='table table-bordered table-striped'>
				<tr>
					<th style='text-align:right;'> <?php echo "Usuario:"; ?></th>
					<td><?php echo $username; ?></td>
				</tr>
				<tr>
					<th style='text-align:right;'> <?php echo "Password:"; ?></th>
					<td><?php echo $password; ?></td>
				</tr>
				
				<tr>
					<th style='text-align:right;'> <?php echo "Nombre:"; ?></th>
					<td><?php echo $name; ?></td>
				</tr>
				<tr>
					<th style='text-align:right;'> <?php echo "Apellido P:"; ?></th>
					<td><?php echo $lastname_f; ?></td>
				</tr>
				<tr>
					<th style='text-align:right;'> <?php echo "Apellido M:"; ?></th>
					<td><?php echo $lastname_m; ?></td>
				</tr>
				<tr>
					<th style='text-align:right;'> <?php echo "Fecha Nac:"; ?></th>
					<td><?php echo date("d-m-Y", strtotime($birth_date)); ?></td>
				</tr>
				<tr>
					<th style='text-align:right;'> <?php echo "Mail:"; ?></th>
					<td><?php echo $mail; ?></td>
				</tr>
				<tr>
					<th style='text-align:right;'> <?php echo "País:"; ?></th>
					<td><?php echo $country_name; ?></td>
				</tr>
				<tr>
					<th style='text-align:right;'> <?php echo "Sexo:"; ?></th>
					<td><?php echo $sex_name; ?></td>
				</tr>
				<tr>
					<th style='text-align:right;'> <?php echo "Fecha Ingreso:"; ?></th>
					<td><?php echo date("d-m-Y", strtotime($created)); ?>		</td>
				</tr>
			</table>
		</div>
		<div class="col-sm-6">
			<table class='table table-bordered table-striped'>				
				<tr>
				<?php echo form_open('User/changeField'); ?>
				<?php echo form_hidden('id',$id); ?>
				<?php echo form_hidden('field','username'); ?>				
					<th style='text-align:right;'>
						<ul class="list-inline list-unstyled">
							<li><?php echo form_label('Nuevo Username', 'user'); ?></li>
							<li><?php echo form_input(array('name' =>'value','class' => 'form-control input-sm')); ?></li>
						</ul>					 	
					 </th>
					<td><?php echo form_submit(array('value' =>'Cambiar', 'class' => 'btn btn-default btn-sm' )); ?></td>
				<?php echo form_close(); ?>
				</tr>
				
				<tr>
				<?php echo form_open('User/changeField'); ?>
				<?php echo form_hidden('id',$id); ?>
				<?php echo form_hidden('field','password'); ?>			
					<th style='text-align:right;'>
						<ul class="list-inline list-unstyled">
							<li><?php echo form_label('Nuevo Password', 'pass'); ?></li>
							<li><?php echo form_input(array('name' =>'value','class' => 'form-control input-sm')); ?></li>
						</ul>					 	
					 </th>
					<td><?php echo form_submit(array('value' =>'Cambiar', 'class' => 'btn btn-default btn-sm' )); ?></td>
				<?php echo form_close(); ?>
				</tr>
				
				<tr>
				<?php echo form_open('User/changeField'); ?>
				<?php echo form_hidden('id',$id); ?>
				<?php echo form_hidden('field','name'); ?>						
					<th style='text-align:right;'>
						<ul class="list-inline list-unstyled">
							<li><?php echo form_label('Nuevo Nombre: ', 'name'); ?>	</li>
							<li><?php echo form_input(array('name' =>'value','class' => 'form-control input-sm')); ?></li>
						</ul>					 	
					 </th>
					<td><?php echo form_submit(array('value' =>'Cambiar', 'class' => 'btn btn-default btn-sm' )); ?></td>
				<?php echo form_close(); ?>
				</tr>

				<tr>
				<?php echo form_open('User/changeField'); ?>
				<?php echo form_hidden('id',$id); ?>
				<?php echo form_hidden('field','lastname_f'); ?>				
					<th style='text-align:right;'>
						<ul class="list-inline list-unstyled">
							<li><?php echo form_label('Nuevo Apellido P: ', 'lnamef'); ?></li>
							<li><?php echo form_input(array('name' =>'value','class' => 'form-control input-sm')); ?></li>
						</ul>					 	
					 </th>
					<td><?php echo form_submit(array('value' =>'Cambiar', 'class' => 'btn btn-default btn-sm' )); ?></td>
				<?php echo form_close(); ?>
				</tr>
				<tr>
				<?php echo form_open('User/changeField'); ?>
				<?php echo form_hidden('id',$id); ?>
				<?php echo form_hidden('field','lastname_m'); ?>								
					<th style='text-align:right;'>
						<ul class="list-inline list-unstyled">
							<li><?php echo form_label('Nuevo Apellido M: ', 'lnamem'); ?></li>
							<li><?php echo form_input(array('name' =>'value','class' => 'form-control input-sm')); ?></li>
						</ul>					 	
					 </th>
					<td><?php echo form_submit(array('value' =>'Cambiar', 'class' => 'btn btn-default btn-sm' )); ?></td>
				<?php echo form_close(); ?>
				</tr>
				<tr>
				<?php echo form_open('User/changeField'); ?>
				<?php echo form_hidden('id',$id); ?>
				<?php echo form_hidden('field','birth_date'); ?>								
					<th style='text-align:right;'>
						<ul class="list-inline list-unstyled">
							<li><?php echo form_label('Nueva Fecha Nac: ', 'birth'); ?></li>
							<li><?php echo form_input(array('class' => 'form-control datepicker' ,'name' => 'value')); ?></li>
						</ul>					 	
					 </th>
					<td><?php echo form_submit(array('value' =>'Cambiar', 'class' => 'btn btn-default btn-sm' )); ?></td>
				<?php echo form_close(); ?>
				</tr>				
				<tr>
				<?php echo form_open('User/changeField'); ?>
				<?php echo form_hidden('id',$id); ?>
				<?php echo form_hidden('field','mail'); ?>								
					<th style='text-align:right;'>
						<ul class="list-inline list-unstyled">
							<li><?php echo form_label('Nuevo Mail: ', 'mail'); ?></li>
							<li><?php echo form_input(array('name' =>'value','class' => 'form-control input-sm')); ?></li>
						</ul>					 	
					 </th>
					<td><?php echo form_submit(array('value' =>'Cambiar', 'class' => 'btn btn-default btn-sm' )); ?></td>
				<?php echo form_close(); ?>
				</tr>
				<tr>
				<?php echo form_open('User/changeField'); ?>
				<?php echo form_hidden('id',$id); ?>
				<?php echo form_hidden('field','country_id'); ?>
				
								
					<th style='text-align:right;'>
						<ul class="list-inline list-unstyled">
							<li><?php echo form_label('Nuevo País: ', 'country'); ?></li>
							<li><?php echo form_dropdown('value', $country_option, $country_option['1'],'class="select-2"'); ?></li>
						</ul>					 	
					 </th>
					<td><?php echo form_submit(array('value' =>'Cambiar', 'class' => 'btn btn-default btn-sm' )); ?></td>
				<?php echo form_close(); ?>
				</tr>
				<tr>
				<?php echo form_open('User/changeField'); ?>
				<?php echo form_hidden('id',$id); ?>
				<?php echo form_hidden('field','sex_id'); ?>								
					<th style='text-align:right;'>
						<ul class="list-inline list-unstyled">
							<li><?php echo form_label('Nuevo Sexo: ', 'sex'); ?></li>
							<li><?php echo form_dropdown('value', $sexes_option, $sexes_option['1'],'class="select-2 form-control"'); ?></li>
						</ul>					 	
					 </th>
					<td><?php echo form_submit(array('value' =>'Cambiar', 'class' => 'btn btn-default btn-sm' )); ?></td>
				<?php echo form_close(); ?>
				</tr>
			</table>
		</div>
	</div>    
  </div>
</div>
		
<script>
    $(document).ready(function(){      
      $('.select-2').select2();    
      $('.datepicker').datepicker({format : 'yyyy/mm/dd'});
    });
</script>
