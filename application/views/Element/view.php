<div class="row">
  <div class="col-sm-10 col-sm-offset-1">
    <legend><?php echo $Element['name']; ?></legend>        
  </div>
</div>  
<div class="row">
  <div class="col-sm-6 col-sm-offset-1">
    <?php echo img(array('class' =>'img-responsive','src' =>'assets/files/uploads/'.$Element['picture'])) ?>
  </div>
  <div class="col-sm-4">
    <i><?php echo $Element['description'] ?></i>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-8 col-sm-offset-1">
    <table class="table table-hover table-bordered">
      <tr>
        <th>Precio</th>
        <td><?php echo '$'.$Element['price']; ?></td>
      </tr>
      <tr>
        <th>Lugar</th>
        <td><?php echo $Country['name']; ?></td>
      </tr>
      <tr>
        <th>Cantidad de personas que les gusta esto:</th>
        <td><?php echo $Likes['count']; ?></td>
      </tr>
      <tr>
        <th>Te gusta?</th>
        <?php if ($Likes['liked']): ?>
          <td>Ya dijiste que si! =)</td>
        <?php else: ?>  
          <form action="../process_likes" method="POST" id='likesform'>                                  
            <input type="hidden" name='element_id_like' id='element_id_like' value="<?php echo $Element['id'];?>">               
          <td> <button type="submit" class="btn btn-default">Me gusta!</button></td>
        </form>      
        <?php endif ?>
      </tr>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-sm-11 col-sm-offset-1">          
    <h3>Comentarios</h3>          
  <?php if (!empty($Comments)): ?>    
      <ol>                
    <?php foreach($Comments as $key => $comment): ?>              
            <li>
              <dl>
                <dt>
                  <?php echo $comment['name'].':'; ?>                  
                </dt>
                <dd>
                  <?php echo $comment['content']; ?>
                </dd>
              </dl>
            </li>
          <?php endforeach; ?>                  
      </ol>          
  <?php else: ?>
    <ul class="list">
      <li>No se registran comentarios, sé el primero!</li>              
    </ul>
  <?php endif ?>
  </div>
</div>
<div class="row">
   <div class="col-sm-6 col-sm-offset-1">
    <h3>Ingresar nuevo comentario</h3>
    <form action="../process_comments" method="POST" id='swaform'>            
      <div class="form-group">
        <label for="content">Comentario</label>
        <input type="hidden" name='element_id' id='element_id' value="<?php echo $Element['id'];?>">
        <textarea type="text" name="content" class="form-control" id="content" placeholder="Ingrese su comentario"></textarea>
      </div>      
      <button type="submit" class="btn btn-default">Comentar</button>
    </form>         
   </div>
 </div>
 <script>
      $(document).ready(function(){
        $("#swaform").submit(function(event) {
          var data = {content : $('#content').val(), element_id_like : $('#element_id_like').val()};
            event.preventDefault();
            bootbox.alert("Se ha enviado exitosamente su formulario", function() {
             $.post("../process_likes", data, function(){              
                 });
            location.reload()       
          });     
        });
        $("#likesform").submit(function(event) {
          var data = {element_id : $('#element_id').val()};
            event.preventDefault();
            bootbox.alert("Se ha enviado exitosamente su formulario", function() {
             $.post("../process_comments", data, function(){              
                 });
            location.reload()       
          });     
        });
      });
  </script>