<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TarefaResource;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TarefaResource::collection(Tarefa::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
            'concluida' => 'sometimes|boolean',
        ]);

        $tarefa = Tarefa::create($dados);

        return new TarefaResource($tarefa);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        return new TarefaResource($tarefa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $dados = $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'concluida' => 'sometimes|boolean',
        ]);

        $tarefa->update($dados);

        return new TarefaResource($tarefa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();

        return response()->json(null, 204);
    }
}
