<?php
namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function index()
    {
        return Cardapio::with('empresa', 'itens')->get(); // Lista todos os cardápios com empresas e itens
    }

    public function store(Request $request)
    {
        $cardapio = Cardapio::create($request->all()); // Cria um novo cardápio
        return response()->json($cardapio, 201);
    }

    public function show($id)
    {
        return Cardapio::with('empresa', 'itens')->findOrFail($id); // Mostra um cardápio específico
    }

    public function update(Request $request, $id)
    {
        $cardapio = Cardapio::findOrFail($id);
        $cardapio->update($request->all()); // Atualiza o cardápio
        return response()->json($cardapio, 200);
    }

    public function destroy($id)
    {
        Cardapio::destroy($id); // Exclui o cardápio
        return response()->json(null, 204);
    }
}

