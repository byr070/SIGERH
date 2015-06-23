  <!-- inicio anticipo -->
  <style type="text/css">
    .form-group{
      padding-bottom: 10px;
    }
    #password{
      width: 150px;
      margin-bottom: 10px;
    }
    .container{
      margin-top: 20px;
      width: 350px;
    }
    #tarjeta{
        width: 220px;
    }
    .center-table{
      margin: 0 auto !important;
      float: none !important;
    }
  </style>

  <?php echo'
    <style type="text/css">
      #btn_ver_tarjeta{
        display: '.$display_btn_ver_tarjeta.';
      }
      #alr_utilizado{
        display: '.$display_alr_utilizado.';
      }
      #alr_incorrecto{
        display: '.$display_alr_incorrecto.';
      }
    </style>
  ' 
  ?>

  
  <div class="container">
    <?php echo form_open('anticipos/seguridad'); ?>
      <div class="form-group">
          <label for="codigo">Código de verificación:</label>
          <input name="codigo" id="codigo" title="código de verificación" type="password" 
          class="form-control text-center center-block" placeholder="Código" readonly/>
          <br>
          <?php echo form_error('codigo','<div class="alert alert-danger" role="alert">','</div>') ?>
          <div id="alr_utilizado" class="alert alert-danger" role="alert">Su código ya fue utilizado.</div>
          <div id="alr_incorrecto" class="alert alert-danger" role="alert">Su código es incorrecto.</div>
      </div>
    
    
    
    <table class="center-table">
        <tbody>
          <tr id="keyboard">
              <td><li class="btn btn-primary">9</li></td>
              <td><li class="btn btn-primary">3</li></td>
              <td><li class="btn btn-primary">7</li></td>
          </tr>
          <tr id="keyboard">
              <td><li class="btn btn-primary">5</li></td>
              <td><li class="btn btn-primary">1</li></td>
              <td><li class="btn btn-primary">6</li></td>
          </tr>
          <tr id="keyboard">
              <td><li class="btn btn-primary">2</li></td>
              <td><li class="btn btn-primary">8</li></td>
              <td><li class="btn btn-primary">4</li></td>
          </tr>
          <tr id="keyboard">
              <td><li class="btn btn-primary center-block">0</li></td>
              <td colspan="2"><li class="btn btn-sm btn-info delete"><span class="glyphicon glyphicon-arrow-left"></span> Borrar</li></td>
          </tr>
        </tbody>
    </table>
    <?php echo form_submit('btn_aceptar','ACEPTAR','class="btn btn-warning center-block"'); ?>
    <?php  echo form_close(); ?>

    
    <label class="text-justify">Si no dispone de una tarjeta o sus códigos ya fueron utilizados, puede <a href="<?php echo base_url('tarjetas'); ?>" >
        crear una tarjeta</a></label>
    <br><br>
    <div id="btn_ver_tarjeta"class="alert alert-success" role="alert">Tarjeta creada con éxito.
      <a href="#" class="alert-link" data-target="#myModal" data-toggle="modal"> Ver tarjeta.</a>
    </div>
    <br><br>
    <div class="modal" id="myModal">
        <div class="modal-dialog"> <!-- modal-sm menor taman -->
          <div class="modal-content">
          
            <div class="modal-header">
              <a href="<?php echo base_url("anticipos/seguridad") ?>" class="close">x</a>
              <h4 class="modal-title">Tarjeta SIGERH</h4>
            </div> <!-- end modal-header -->
          
            <div class="modal-body">
              <table class="table center-block" id="tarjeta">
                <tbody>
                    <?php for ($i=1; $i <= 10; $i++) { 
                      $pos='TRJ_' . $i . '_VALOR';
                      if($i%2){echo '<tr>';}
                      echo '<td class="info"> <span class="glyphicon glyphicon-unchecked"></span> '.$generado[$pos].'</td>';
                      if(!($i%2)){echo '</tr>';}
                    } ?>
                </tbody>
              </table>
              <ul>
                <li>Cada código puede utilizarse una sola vez.</li>
                <li>Mantenlos en un lugar accesible, como tu billetera.</li>
              </ul>
              Fecha de generación de la tarjeta: <?php echo strftime("%d %b %G"); ?>
              
            </div> <!-- end modal-body -->
          
            <div class="modal-footer">
              <!-- <button class="btn btn-default" data-dismiss="modal">Cerrar</button> -->
              <a href="<?php echo base_url("anticipos/seguridad") ?>" class="btn btn-danger">Cerrar</a>
            </div><!-- end modal footer -->
          </div> <!-- end modal-content -->
        </div> <!-- end modal-dialog -->
      </div> <!-- end modal -->
  </div> <!-- container -->