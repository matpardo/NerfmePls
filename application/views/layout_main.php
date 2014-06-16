<!DOCTYPE html>
  <?php //echo '<pre>'. print_r($_SESSION,1).'</pre>'; die;?>
  <html>
  <head>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (isset($title_for_layout))?$title_for_layout:'Turismo' ?></title>

    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
    <?php echo link_tag('assets/css/home.css'); ?>
    <?php echo link_tag('assets/css/font-awesome.min.css'); ?>
    <?php echo link_tag('assets/css/select2-bootstrap.css'); ?>
    <?php echo link_tag('assets/css/select2.css'); ?>
    
    <?php echo script_tag('assets/js/jquery-2.1.0.min.js'); ?>
    <?php echo script_tag('assets/js/bootstrap.min.js'); ?>
    <?php echo script_tag('assets/js/bootbox.min.js'); ?>
    <?php echo script_tag('assets/js/select2.min.js'); ?>
    <?php echo script_tag('assets/js/select2_locale_es.js'); ?>
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
          <li><?php echo anchor('element/', 'Inicio', array('title' => 'Inicio')); ?></li>
          <li><?php echo anchor('element/places/', 'Tours', array('title' => 'Tours')); ?></li>
          <li><?php echo anchor('element/rent/', 'Hoteles/Alquileres', array('title' => 'Hoteles/Alquileres')); ?></li>
          <li><?php echo anchor('element/restaurant/', 'Restaurantes', array('title' => 'Restaurantes')); ?></li>
          
          <?php if ($this->session->userdata('group_id') == 1): ?>
          <li><?php echo anchor('user/admin/', 'Administrar', array('title' => 'Administrar')); ?></li>
          <?php endif ?>
          <li><?php echo anchor('user/logout/', 'Cerrar Sesión', array('title' => 'Cerrar Sesión','class' => 'btn btn-link')); ?></li>            
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>

  <!-- Contenido de la página -->
  <div class="container">
      <ol class="breadcrumb" style='text-align:right;'>
        <li><?php echo anchor('user/profile_data/', 'Ver mis datos', array('title' => 'Ver información personal','class' => 'btn btn-link')); ?></li> 
      </ol>
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

</body>
</html>
