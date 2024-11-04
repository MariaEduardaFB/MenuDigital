<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        return Empresa::all(); 
    }

    public function store(Request $request)
    {
        $empresa = Empresa::create($request->all()); 
        return response()->json($empresa, 201);
    }

    public function show($id)
    {
        return Empresa::findOrFail($id); 
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all()); 
        return response()->json($empresa, 200);
    }

    public function destroy($id)
    {
        Empresa::destroy($id); 
        return response()->json(null, 204);
    }
}

