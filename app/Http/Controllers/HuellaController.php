<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HuellaController extends Controller
{
    public function registrar(Request $request)
    {
        $id_cliente = $request->id_cliente;

        // Guardar orden para Arduino
        file_put_contents(
            base_path('orden_huella.txt'),
            "REGISTRAR:$id_cliente"
        );

        return redirect()->back()->with(
            'CORRECTO',
            'Coloque el dedo en el sensor'
        );
    }
}
