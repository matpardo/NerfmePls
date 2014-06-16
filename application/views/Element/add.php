<!-- Contenido de la página -->
  <div class="container">    
    <?php echo form_open_multipart('element/end_add');?>
    <div class="panel panel-default">
      <div class="panel-heading" style = "text-align: center;">
        <b>Formulario de Registro de elementos</b>
      </div>
      <!-- Cuerpo del Panel -->
      <div class="panel-body">
        <div class = "row">
          <div class = "col-sm-12">
            <legend>INFORMACION DEL ELEMENTO</legend>
          </div>
        </div>
        <div class = "row">
          <div class = "col-sm-6">
            <div class = "vertical_bar">              
              <div class = "row">
                <div class = "col-sm-12">
                  <div class="input text">
                    <label for="name">Nombre</label>
                    <input required='required' name="name" class="form-control" maxlength="255" type="text" id="name" required="required"/>
                  </div>
                </div>                
              </div>
              <br>
              <div class="row">
                <div class = "col-sm-6">
                  <div>
                    <label for="country_id">Pais</label>
                    <select required='required' name="country_id" class="form-control sel2" id="country_id">
                      <option value=''>Seleccionar País</option>
                      <?php foreach ($Countries as $key => $value): ?>
                        <option value="<?php echo $key ?>"> <?php echo $value; ?></option>;              
                      <?php endforeach ?>            
                    </select>
                  </div>          
                </div>
                <div class = "col-sm-6">
                  
                </div> 
              </div>                   
              <br>
              <div class = "row">
                <div class = "col-sm-12">
                  <div class="input required">
                    <label for="description">Descripción</label>
                    <textarea name="description" class="form-control" id="description" required="required">
                    </textarea>
                  </div>
                </div>
              </div>
              <br>              
            </div>
          </div>
          <div class = "col-sm-5">                  
            <div class = "row">
              <div class = "col-sm-12">
                <div class="input text">                
                  <label for="section_id">Sección</label>
                  <select required='required' name="section_id" class="form-control sel2" id="section_id">
                      <option value=''>Seleccionar Sección</option>
                        <option value=1><?php echo 'Hoteles/Alquileres'; ?></option>;
                        <option value=2><?php echo 'Restaurant'; ?></option>;
                        <option value=3><?php echo 'Tours'; ?></option>;                      
                    </select>
                </div>          
              </div>
            </div>
            <br>
            <div class = "row">
              <div class = "col-sm-12">
                <div class="input number">
                  <label for="price">Precio</label>
                  <input required='required' name="price" class="form-control" type="number" id="price"/>
                </div>          
              </div>
            </div>
            <br>
            <div class = "row">
              <div class = "col-sm-12">
                <div class="input file">
                  <label for="picture">Imagen</label>
                  <input required='required' name="userfile" class="form-control" type="file" id="userfile"/>
                </div>
              </div>
            </div>
            <br>            
          </div>
        </div>
        <br>
        <br>
        <!-- Boton de envío y leyenda -->
        <div class = "row">
          <div class = "col-sm-4">
            
          </div>
          <div class="logForm col-sm-7 col-sm-offset 1">
            <button type="submit" class="btn btn-success btn-lg pull-right">Enviar Datos</button>       

            </form>     
          </div>
        </div>
      </div>
  </div>


  <script>
    $(document).ready(function(){
      
      $('.sel2').select2();    
    });
  </script>
