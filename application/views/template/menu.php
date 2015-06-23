        <!-- Inicio Menu -->
        <?php if(!is_null($menu)) { 
          $empleados=array();
          $cuadrillas=array();
          $salidas=array();
          for ($i=0; $i < sizeof($menu); $i++) { 
            if($i % 2){
              switch ($menu[$i]) {
                case '1':
                  # code...
                  array_push($empleados, strtolower($menu[$i-1]));
                  break;
                case '2':
                  # code...
                  array_push($cuadrillas, strtolower($menu[$i-1]));
                  break;
                case '3':
                  # code...
                  array_push($salidas, strtolower($menu[$i-1]));
                  break;
                default:
                  # code...
                  break;
                } // end switch
              } // end if
            } // end for  
          } // end if
          ?>


        <div class="container" role="main">
          <nav class="navbar navbar-inverse">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Odebressss</a>
              </div>
              <div id="navbar2" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empleados <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <?php for ($i=0; $i < sizeof($empleados) ; $i++) { ?>
                        <li><a href="<?php echo base_url('').$empleados[$i] ?>"><?php echo $empleados[$i]; ?></a></li> 
                      <?php } ?>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cuadrillas <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <?php for ($i=0; $i < sizeof($cuadrillas) ; $i++) { ?>
                        <li><a href="<?php echo base_url('').$cuadrillas[$i] ?>"><?php echo $cuadrillas[$i]; ?></a></li> 
                      <?php } ?>
                      <!-- <li role="separator" class="divider"></li> -->
                      <!-- <li class="dropdown-header">Nav header</li> -->
                    </ul>
                  </li>

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Salidas <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <?php for ($i=0; $i < sizeof($salidas) ; $i++) { ?>
                        <li><a href="<?php echo base_url('').$salidas[$i] ?>"><?php echo $salidas[$i]; ?></a></li> 
                      <?php } ?>
                    </ul>
                  </li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
          </nav>
        </div> <!-- /container -->
        <!-- Fin Menu -->