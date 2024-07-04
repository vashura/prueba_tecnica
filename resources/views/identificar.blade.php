<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subir y Previsualizar Imágenes</title>
  <style>
    /* Estilos opcionales para el formulario y la previsualización */
    .formulario {
      max-width: 500px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="file"] {
      margin-bottom: 10px;
    }
    input[type="submit"], input[type="button"] {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
    }
    input[type="submit"]:hover, input[type="button"]:hover {
      background-color: #0056b3;
    }
    .preview {
      max-width: 100%;
      max-height: 300px;
      margin-top: 10px;
    }
    .preview-container {
      display: flex;
      flex-wrap: wrap;
    }
    .preview-item {
      margin: 10px;
    }
  </style>
</head>
<body>
  <form class="formulario" method="post" action="{{ route('Documento.store')}}" enctype="multipart/form-data">
    @csrf
    <label for="archivos">Selecciona múltiples archivos:</label>
    <input type="file" id="archivos" name="archivos[]" multiple accept=".jpg, .png"><!-- Acepta archivos con extensiones .jpg y .png -->
    <br>
    <input type="button" value="Obtener Nombres y Tipos" onclick="mostrarInfoArchivos()">
    <input type="hidden" value="" id="doctos" name="doctos" /> <br/><br/>
    <input type="submit" value="Enviar">
  </form>

  <div class="preview-container" id="previewContainer"></div>

  <div id="names"></div>

  <script>
    function mostrarInfoArchivos() {
      var hdoctos = document.getElementById("doctos");
      var divLista = document.getElementById("names");
      var inputArchivos = document.getElementById('archivos');
      var archivosSeleccionados = inputArchivos.files;
      var ul = document.createElement("ul");
      var aux = "";

      // Limpiar lista previa de nombres de archivos
      divLista.innerHTML = '';

      for (var i = 0; i < archivosSeleccionados.length; i++) {
          var li = document.createElement("li");
          li.textContent = archivosSeleccionados[i].name;
          ul.appendChild(li);
          aux = aux + archivosSeleccionados[i].name + ",";
      }
      console.log(aux);
      hdoctos.value = aux;
      divLista.appendChild(ul);

      // Previsualización de imágenes (si es necesario)
      const previewContainer = document.getElementById('previewContainer');
      previewContainer.innerHTML = ''; // Limpiar previas imágenes

      for (let i = 0; i < archivosSeleccionados.length; i++) {
          const file = archivosSeleccionados[i];

          if (file.type.startsWith('image/')) {
              const reader = new FileReader();

              reader.addEventListener('load', function() {
                  const imgElement = document.createElement('img');
                  imgElement.classList.add('preview', 'preview-item');
                  imgElement.src = reader.result;
                  previewContainer.appendChild(imgElement);
              });

              reader.readAsDataURL(file);
          }
      }
    }
  </script>
</body>
</html>
