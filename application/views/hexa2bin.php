<!DOCTYPE html>

<html>
   <head>
       <title>title</title>
   </head>
   <body>
       <div>
           Selecciona un fichero: <br />
          <input type="file" value="Leer" id="fichero"/> 
      </div>
      <script type="text/javascript">
          function ficheroSeleccionado(evt) {
              var ficheros = evt.target.files;
              // Tan solo procesaremos el primer fichero
              var fichero = ficheros[0];
          }
          document.getElementById("fichero").addEventListener('change', ficheroSeleccionado, false);
      </script>
<div id="raw" class="terminal"></div>
      <div id="rawtext" class="terminal" ></div>
  </body>
</html>