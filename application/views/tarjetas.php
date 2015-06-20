<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("assets/css/bootstrap.min.css") ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    #tarjeta{
      width: 220px;
    }
    </style>
  </head>
  <body>
    <div class="container">      

          <!-- <table class="table text-center col-md-12">
            <tbody>
              <tr class="danger">
                <th>&nbsp;</th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>F</th><th>G</th><th>H</th><th>I</th>
              </tr>
              <?php 
              $pos;
              for ($fila=0; $fila < 9; $fila++) { 
                echo '<tr>';
                echo '<th class="danger">'.($fila+1).'</th>';
                for ($columna=0; $columna < 9; $columna++) {
                  switch ($columna) {
                  case '0':$pos="A";break;
                  case '1':$pos="B";break;
                  case '2':$pos="C";break;
                  case '3':$pos="D";break;
                  case '4':$pos="E";break;
                  case '5':$pos="F";break;
                  case '6':$pos="G";break;
                  case '7':$pos="H";break;
                  case '8':$pos="I";break;
                  case '9':$pos="J";break;
                  default:break;
                }
                  $pos=$pos.($fila+1);
                  if($fila%2){
                    echo '<td><h4><div class="col-md-5 label label-info">'.$generado[$pos].'</div></h4></td>';
                  }
                  else{ //fila impar
                    echo '<td class="info"><h4><div class="col-md-5 label label-info">'.$generado[$pos].'</div></h4></td>';
                  }
                  $pos="";
                }
                echo '</tr>';
              } ?>
              
            </tbody>
          </table> -->
          <div class="table-responsive">
            <table class="table table-bordered center-block" id="tarjeta">
              <tbody>
                  <?php for ($i=1; $i <= 10; $i++) { 
                    $pos='TRJ_' . $i . '_VALOR';
                    if($i%2){echo '<tr>';}
                    echo '<td class="info"> <span class="glyphicon glyphicon-unchecked"></span> '.$generado[$pos].'</td>';
                    if(!($i%2)){echo '</tr>';}
                  } ?>
              </tbody>
            </table>
          </div>  <!-- table-responsive -->
    </div> <!-- container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
  </body>
</html>