<?php

namespace App\Http\Controllers;

use App\Models\Itens_Cardapio;
use Illuminate\Http\Request;

class ItensCardapioController extends Controller
{
    public function index()
    {
        return Itens_Cardapio::all(); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable|string',
            'preco' => 'required',
            'fk_Cardapio_id_cardapio' => 'required', 
        ]);
    
        $item = new Itens_Cardapio();
        $item->nome = $request->nome;
        $item->descricao = $request->descricao;
        $item->preco = $request->preco;
        $item->fk_Cardapio_id_cardapio = $request->fk_Cardapio_id_cardapio;
        $item->save();
    
        return response()->json(['message' => 'Item adicionado com sucesso'], 201);
    }

    public function show($id)
    {
        return Itens_Cardapio::findOrFail($id); 
    }

    public function update(Request $request, $id)
    {
        $item = Itens_Cardapio::findOrFail($id);
        $item->update($request->all());
        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        Itens_Cardapio::destroy($id);
        return response()->json(null, 204);
    }
}

