<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $documentos = Documento::paginate(5);
        return view('documentos.index')->with('documentos',$documentos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request){
        $archivos = $_FILES['archivos'];

        // Ruta donde se guardarán los archivos subidos
        $carpeta_destino = 'upload/';

        // Iterar sobre cada archivo subido
        foreach ($archivos['tmp_name'] as $key => $tmp_name) {
            $nombre_archivo = basename($archivos['name'][$key]);
            $tipo_archivo = $archivos['type'][$key];
            $nombre_temporal = $archivos['tmp_name'][$key];
            $error = $archivos['error'][$key];

            // Validar tipo de archivo si es necesario
            $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));
            $extensiones_permitidas = array('jpg', 'png');

            if (!in_array($extension, $extensiones_permitidas)) {
                echo "Error: El archivo $nombre_archivo tiene una extensión no permitida.";
                continue;
            }

            // Guardar archivo en el servidor
            $ruta_destino = $carpeta_destino . $nombre_archivo;
            
            if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
                //echo "El archivo $nombre_archivo se ha subido correctamente.";

                // Obtener datos binarios de la imagen
                $imagen_binaria = file_get_contents($ruta_destino);

               $imagen_base64 = base64_encode($imagen_binaria);
                //$imagen_base64 = base64_decode(base64_encode($imagen_binaria));

                // Guardar en la base de datos
                echo "datos a guardar que generar error: $nombre_archivo $extension $nombre_archivo $ruta_destino";
                Documento::create([
                    'name' => $nombre_archivo,
                    'type' =>  $extension,  
                    'data' =>  $ruta_destino,  // Almacena los datos binarios directamente
                ]);

                
             
            } else {
                echo "Error al subir el archivo $nombre_archivo.";
            }
        }

        return "exito";
    }


    /**
     * Display the specified resource.
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documento $documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documento $documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documento $documento)
    {
        //
    }
}
