<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Obtener Nombre y Tipo de Archivos</title>
  <style>
    /* Estilos opcionales para el formulario */
    .formulario {
      max-width: 300px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="file"] {
      margin-bottom: 10px;
    }
    input[type="submit"] {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <form class="formulario" method="post" action="{{ route('Documento.store')}}">
    @csrf

    <label for="archivos">Selecciona múltiples archivos:</label>
    <input type="file" id="archivos" name="archivos[]" multiple accept=".txt, .pdf, .docx"><!-- Acepta archivos con extensiones .txt, .pdf, .docx -->
    <br>
    <input type="button" value="Obtener Nombres y Tipos" onclick="mostrarInfoArchivos()">
    <input type="hidden" value="" id="doctos" name="doctos" /> <br/><br/>
    <input type="submit" value="Enviar">
  </form>

  <div id="contenedor">
      <div id="names">

      </div>
  </div>

  <script>
    function mostrarInfoArchivos() {
      var hdoctos = document.getElementById("doctos");
      var divLista = document.getElementById("names");
      var inputArchivos = document.getElementById('archivos');
      var archivosSeleccionados = inputArchivos.files;
      var ul = document.createElement("ul");
      var aux ="";

      for (var i = 0; i < archivosSeleccionados.length; i++) {
        var li = document.createElement("li");
        li.textContent = archivosSeleccionados[i].name; 
        ul.appendChild(li); 
        aux =aux +archivosSeleccionados[i].name+",";
      }
      console.log(aux);
      hdoctos.value=aux;
      divLista.appendChild(ul);
    }
  </script>
</body>
</html>
