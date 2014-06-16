<!DOCTYPE html>
  <?php //echo '<pre>'. print_r($_SESSION,1).'</pre>'; die;?>
  <html>
  <head>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title_for_layout ?></title>

    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
    <?php echo link_tag('assets/css/home.css'); ?>
    <?php echo link_tag('assets/css/font-awesome.min.css'); ?>
    
  </head>
  <body> 
   <!-- Fixed navbar -->
   <div class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">            
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <h4><i class="fa fa-user"></i> <?php echo 'Bienvenido '. $this->session->userdata('name').' '. $this->session->userdata('lastname_f').' '. $this->session->userdata('lastname_m'); ?></h4>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="home.php">Inicio</a></li>
          <li><a href="places.php">Tours</a></li>
          <li><a href="rent.php">Hoteles/Alquileres</a></li>
          <li><a href="restaurant.php">Restaurantes</a></li>
          
          <?php //if ($_SESSION['Auth']['User']['group_id'] == 1): ?>
          <li><a href="admin.php">Administrar</a></li>  
          <?php //endif ?>
          <li><a href="src/logout.php">Cerrar Sesión</a></li>            
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>

  <!-- Contenido de la página -->
  <div class="container">
     <?php echo $content_for_layout ?>   
  </div>

<br />
<div id="footer">
  <div class="container">  
    <p class="text-muted">
      Dirección falsa, Lejos, Muy Lejos.<br />     
      <a href= "mailto:contacto@falso.cl"><i class="fa fa-mail"></i>Correo</a>
    </p>                      
  </div>
</div>

<?php echo script_tag('assets/js/jquery-2.1.0.min.js'); ?>
<?php echo script_tag('assets/js/bootstrap.min.js'); ?>
<?php echo script_tag('assets/js/bootbox.min.js'); ?>

</body>
</html>
