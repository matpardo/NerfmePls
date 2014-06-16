<div class="jumbotron" id="jum">
  <h1> Agencia de viajes y turismo: SWA </h1>
</div>
<div class="row">
  <div class="col-sm-12">
    <?php if (!empty($elements)): ?>
      <?php foreach ($elements as $key => $section): ?>
        
      <?php endforeach; ?>
    <?php else: ?>  
    
    <?php endif ?>
    <table cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
      <tr>
        <th><?php echo 'Nombres'; ?></th>
        <td><?php echo $this->session->userdata('name'); ?></td>
      </tr>
      <tr>
      <tr>
        <th><?php echo 'Apellido paterno'; ?></th>
        <td><?php echo $this->session->userdata('lastname_f'); ?></td>
      </tr>
      <tr>
        <th><?php echo 'Apellido materno'; ?></th>
        <td><?php echo $this->session->userdata('lastname_m'); ?></td>
      </tr>
      <tr>
        <th><?php echo 'Nombre de usuario'; ?></th>
        <td><?php echo $this->session->userdata('username'); ?></td>
      </tr>
        <th><?php echo 'Grupo'; ?></th>
        <td><?php //echo $_SESSION['Auth']['Group']['name']; ?></td>
      </tr>          
      <tr>
        <th><?php echo 'Fecha de nacimiento'; ?></th>
        <td><?php// echo (is_null($_SESSION['Auth']['User']['birth_date']))?'' : date('d/m/Y',strtotime($_SESSION['Auth']['User']['birth_date'])); ?></td>
      </tr>
      <tr>
        <th><?php echo 'Sexo'; ?></th>
        <td><?php //echo $_SESSION['Auth']['Sex']['name']; ?></td>
      </tr>
      <tr>
        <th><?php echo 'Ciudad'; ?></th>
        <td><?php //echo $_SESSION['Auth']['Place']['city_name'].', '.$_SESSION['Auth']['Place']['country_name']; ?></td>
      </tr>
                     
    </table>
  </div>
</div>
