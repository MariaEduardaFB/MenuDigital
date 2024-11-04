<?php
namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function index()
    {
        return Cardapio::with('empresa', 'itens')->get(); 
    }

    public function store(Request $request)
    {
        $cardapio = Cardapio::create($request->all()); 
        return response()->json($cardapio, 201);
    }

    public function show($id)
    {
        return Cardapio::with('empresa', 'itens')->findOrFail($id); 
    }

    public function update(Request $request, $id)
    {
        $cardapio = Cardapio::findOrFail($id);
        $cardapio->update($request->all()); 
        return response()->json($cardapio, 200);
    }

    public function destroy($id)
    {
        Cardapio::destroy($id); 
        return response()->json(null, 204);
    }
}

