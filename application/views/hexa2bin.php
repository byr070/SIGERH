<!DOCTYPE html>
    2 
    3 <html>
    4     <head>
    5         <title>title</title>
    6     </head>
    7     <body>
    8         <div>
    9             Selecciona un fichero: <br />
   10             <input type="file" value="Leer" id="fichero"/> 
   11         </div>
   12         <script type="text/javascript">
   13             function ficheroSeleccionado(evt) {
   14                 var ficheros = evt.target.files;
   15                 // Tan solo procesaremos el primer fichero
   16                 var fichero = ficheros[0];
   17             }
   18             document.getElementById("fichero").addEventListener('change', ficheroSeleccionado, false);
   19         </script>
   <div id="raw" class="terminal"></div>
    2         <div id="rawtext" class="terminal" ></div>
   20     </body>
   21 </html>