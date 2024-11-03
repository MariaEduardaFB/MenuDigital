<?php

namespace App\Http\Controllers;

use App\Models\Itens_Cardapio;
use Illuminate\Http\Request;

class ItensCardapioController extends Controller
{
    public function index()
    {
        return Itens_Cardapio::all(); // Lista todos os itens do cardápio
    }

    public function store(Request $request)
    {
        $item = Itens_Cardapio::create($request->all()); // Cria um novo item
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return Itens_Cardapio::findOrFail($id); // Mostra um item específico
    }

    public function update(Request $request, $id)
    {
        $item = Itens_Cardapio::findOrFail($id);
        $item->update($request->all()); // Atualiza o item
        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        Itens_Cardapio::destroy($id); // Exclui o item
        return response()->json(null, 204);
    }
}

