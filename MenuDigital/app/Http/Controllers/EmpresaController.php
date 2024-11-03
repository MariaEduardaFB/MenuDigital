<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        return Empresa::all(); // Lista todas as empresas
    }

    public function store(Request $request)
    {
        $empresa = Empresa::create($request->all()); // Cria uma nova empresa
        return response()->json($empresa, 201);
    }

    public function show($id)
    {
        return Empresa::findOrFail($id); // Mostra uma empresa específica
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all()); // Atualiza a empresa
        return response()->json($empresa, 200);
    }

    public function destroy($id)
    {
        Empresa::destroy($id); // Exclui a empresa
        return response()->json(null, 204);
    }
}

