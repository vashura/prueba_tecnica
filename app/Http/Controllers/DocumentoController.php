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
    public function store(Request $request)
    {
        $documentos =$request['doctos'];
        if (empty($documentos )){
            return "no hay documentos";
        
        }else{
            $documentos = substr($documentos, 0, -1); 
        }
        //obtener los datos para guardar
        $documentos_ar = explode(",", $documentos);
        
        $c = count($documentos_ar);

        foreach ($documentos_ar as $docto) {
            $docto_ar= explode(".", $docto);
          
            // Documento::create($docto_ar);
            Documento::create([
                'name' => $docto_ar[0],  // Ajusta según la estructura de tu tabla Documento
                'type' => isset($docto_ar[1]) ? $docto_ar[1] : null,  // Ajusta según la estructura de tu tabla Documento
            ]);
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
