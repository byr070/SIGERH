    <!-- Inicio Menu -->
    <?php if(!is_null($menu)) { 
      $empleados=array();
      $cuadrillas=array();
      $salidas=array();
      $configuracion=array();


      for ($i=0; $i < sizeof($menu); $i++) { 
        if($i % 2){
          switch ($menu[$i]) {
            case '1':
              array_push($empleados, $menu[$i-1]);
              break;
            case '2':
              array_push($cuadrillas, $menu[$i-1]);
              break;
            case '3':
              array_push($salidas, $menu[$i-1]);
              break;
            case '4':
              array_push($configuracion,$menu[$i-1]);
            default:
              # code...
              break;
            } // end switch
          } // end if
        } // end for  
      } // end if
      ?>



    <div class="container" role="main">
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#"></a> -->
          </div>
          <div id="navbar2" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <?php if(!sizeof($configuracion)>0){//inicio ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empleados <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <?php for ($i=0; $i < sizeof($empleados) ; $i++) { ?>
                    <?php if($i==2){echo '<li role="separator" class="divider"></li>';} ?>
                    <li><a href="<?php echo base_url('').$empleados[$i] ?>"><?php echo $empleados[$i]; ?></a></li> 
                  <?php } ?>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Grupos de trabajo <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <?php for ($i=0; $i < sizeof($cuadrillas) ; $i++) { ?>
                    <?php if($i==2){echo '<li role="separator" class="divider"></li>';} ?>
                    <li><a href="<?php echo base_url('').$cuadrillas[$i] ?>">
                      <?php switch ($cuadrillas[$i]) {
                        case 'Cuadrillas':
                          echo 'Grupos de trabajo';
                          break;
                        
                        default:
                          echo $cuadrillas[$i];
                          break;
                      }?>
                    </a></li> 
                  <?php } ?>
                  <!-- <li role="separator" class="divider"></li> -->
                  <!-- <li class="dropdown-header">Nav header</li> -->
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Salidas <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <?php for ($i=0; $i < sizeof($salidas) ; $i++) { ?>
                    <?php if($i==2){echo '<li role="separator" class="divider"></li>';} ?>
                    <li><a href="<?php echo base_url('').$salidas[$i] ?>"><?php 
                    switch ($salidas[$i]) {
                      case 'Periodos_salida':
                        echo 'Periodos de salida';
                        break;
                      case 'Tipos_permiso':
                        echo 'Tipos de permiso';
                        break;
                      default:
                        echo $salidas[$i];
                        break;
                    }?>
                  </a></li> 
                  <?php } ?>
                </ul>
              </li>
              <?php }else{ //configuracion ?>
              <?php for ($i=0; $i < sizeof($configuracion) ; $i++) { ?>
              <li><a href="<?php echo base_url('').strtolower($configuracion[$i]) ?>"><?php echo $configuracion[$i]; ?></a></li>
              <?php } ?>
              
              <?php } ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    </div> <!-- /container -->
    <!-- Fin Menu -->
