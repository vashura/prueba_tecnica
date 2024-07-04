<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>archivos</title>

</head>
<body>

  <table class="table">
    <thead>
      <th>nombre</th>
      <th>tipo</th>
      <th>imagen</th>
    </thead>
  
    <tbody>
      @forelse ($documentos as $item)
        <tr>
          <td>{{$item->name}}</td>
          <td>{{$item->type}}</td>
          <td>
            <img src="{{$item->data}}" alt="Descripción de la imagen" width="300" height="200">
          </td>
        </tr>  
      @empty
      <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      @endforelse
    </tbody>
      

  </table>
  


</body>
</html>
