<?php

// app/Http/Controllers/ValesController.php

namespace App\Http\Controllers;

use App\Models\EntregaVale;
use Illuminate\Http\Request;

class EntregaValesController extends Controller
{

    public function index()
    {
        return view('index');  
    }

    public function entregavalesList()
    {
        // Obtener todos los registros de la tabla EntregaVale
        $entregavales = EntregaVale::all();
        
        // Devolver los datos como JSON
        return response()->json($entregavales);  // Esto debe devolver los entregavales en formato JSON
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'numero_solicitud' => 'required|string|max:255',
            'programa' => 'required|string|max:255',
            'suministra' => 'required|string|max:255',
            'solicita' => 'required|string|max:100',
            'depto_solicita' => 'required|string|max:100',
            'tipo_fondo' => 'required|string|max:255',
            'mision' => 'required|string',
            'fecha_reserva' => 'required|date',
            'fecha_vence' => 'required|date',
            'destino' => 'required|string|max:200',
            'departamento' => 'required|string|max:255',
            'proyecto' => 'required|string|max:200',
            'autoriza' => 'required|string|max:100',
            'combustible' => 'required|string|max:20',
            // 'cantidad_combustible' => 'required|numeric',
            // 'conversion' => 'required|numeric',
            // 'serie' => 'required|string|max:50',
            // 'no_requisicion' => 'required|string|max:50',
            // 'precio_compra' => 'nullable|numeric',
            // 'precio_actual' => 'nullable|numeric',
            // 'autorizados' => 'nullable|string|max:100',
            // 'digitados' => 'nullable|string|max:100',
            // 'serie_vale' => 'nullable|string|max:100',
        ]);


        EntregaVale::create([
            'numero_solicitud' => $request->numero_solicitud,
            'programa' => $request->programa,
            'suministra' => $request->suministra,
            'solicita' => $request->solicita,
            'depto_solicita' => $request->depto_solicita,
            'tipo_fondo' => $request->tipo_fondo,
            'mision' => $request->mision,
            'departamento' => $request->departamento,
            'fecha_reserva' => $request->fecha_reserva,
            'fecha_vence' => $request->fecha_vence,
            'destino' => $request->destino,
            'proyecto' => $request->proyecto,
            'autoriza' => $request->autoriza,
            'combustible' => $request->combustible,
            // 'cantidad_combustible' => $request->cantidad_combustible,
            // 'conversion' => $request->conversion,
            // 'serie' => $request->serie,
            // 'no_requisicion' => $request->no_requisicion,
            // 'precio_compra' => $request->precio_compra,
            // 'precio_actual' => $request->precio_actual,
            // 'autorizados' => $request->autorizados,
            // 'digitados' => $request->digitados,
            // 'serie_vale' => $request->serie_vale,
        ]);

        return redirect()->back()->with('success', 'Vales generados exitosamente.');
    }
}