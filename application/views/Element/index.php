
<div class="jumbotron" id="jum">
  <h1> Agencia de viajes y turismo: SWA </h1>
</div>
<div class="row">
  <div class="col-sm-12">
    <?php if (!empty($elements)): ?>
      <h2><?php echo '¡Nuestras recomendaciones para ti!' ?></h2>
      <?php foreach ($elements as $key => $section): ?>
        <?php switch ($key) {
          case 1:
            echo '<h3> Hoteles/Alquileres </h3>';
            break;
          case 2:
            echo '<h3> Restaurantes </h3>';
            break;
          case 3:
            echo '<h3> Tours </h3>';
            break; 
          default:
            echo 'Otro';
            break;
        } ?>
        <table cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
          <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Likes</th>
            <th>Mas información</th>
          </tr>
        <?php foreach ($section as $element): ?>
          <tr>
            <td><?php echo $element['name'] ?></td>
            <td><?php echo $element['price'] ?></td>
            <td><?php echo $element['count'] ?></td>
            <td><?php echo anchor('element/view/'.$element['id'], 'Ver más', array('title' => 'Mas información del lugar')); ?></td>
          </tr>
        <?php endforeach ?>
        </table>    
      <?php endforeach; ?>
    <?php else: ?>  
      <h2><?php echo 'No encontramos alguna recomendación para el lugar en el que te encuentras' ?></h2> <br/>
       Si quieres puedes agregar alguna reseña <?php echo anchor('element/add/', 'aquí', array('title' => 'Mas información del lugar','class' => 'btn btn-link')); ?>
    <?php endif ?>
    
  </div>
</div>
