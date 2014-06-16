    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <legend>Restaurantes</legend>        
      </div>
    </div>  
    <div class="row">
      <div class="col-sm-6 col-sm-offset-1">
        <?php echo img(array('class' =>'img-responsive','src' =>'/assets/img/img_restaurant.jpg')); ?>
      </div>
      <div class="col-sm-4">
        <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed adipiscing justo ipsum, blandit auctor odio dignissim quis. Pellentesque convallis porta nulla venenatis scelerisque. In enim nisi, gravida et lacus in, condimentum varius diam. Praesent imperdiet odio ut mi adipiscing dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla nibh leo, vehicula rutrum nisl a, varius suscipit sapien. Phasellus vel felis nibh. Etiam egestas vitae metus vitae volutpat. Nulla varius dui eu elementum iaculis. Sed in varius diam, sed fringilla lectus. </i>
      </div>
    </div>
    
    <div class="row">
      <div class="col-sm-4 col-sm-offset-1">
        <h3>País</h3>
        <select name="country_id" class="form-control sel2" id="country_id">
          <option value=''>Seleccionar País</option>
          <?php foreach ($Countries as $key => $value): ?>
            <option value="<?php echo $key ?>"> <?php echo $value; ?></option>;              
          <?php endforeach ?>            
        </select>

      </div>
    </div>

    <div class="row">
     <div class="col-sm-6 col-sm-offset-1">
      <?php if (isset($Elements)): ?>
      <h3>Lista de Lugares por País</h3>
      <table cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
        <tr>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Likes</th>
          <th>Opciones</th>
        </tr>
          <?php foreach ($Elements as $element): ?>
            <tr>
              <td><?php echo $element['name'] ?></td>
              <td><?php echo $element['price'] ?></td>
              <td><?php echo (is_null($element['num_likes']))? 0 : $element['num_likes'] ?></td>
              <td>
                <?php echo anchor('element/view/'.$element['id'], 'Ver', array('title' => 'Mas información del lugar','class' => 'btn btn-xs btn-default')); ?>
                <?php echo ($this->session->userdata('group_id') == 1)? anchor('element/remove/'.$element['id'], 'Eliminar', array('title' => 'Eliminar entrada','class' => 'btn btn-xs btn-danger')):''; ?>
              </td>
            </tr>
          <?php endforeach ?>          
        <?php endif ?>
      </table>             

    </div>
  </div> 

  <script>
    $('.sel2').select2();
    
    $(document).ready(function(){      
      $('body').on('change','#country_id',function(){
        var country_id = Number($(this).val());
        window.location.href = "<?php echo site_url('/element/restaurant/') ?>"+'/'+country_id;
      });    
    });
  </script>     

