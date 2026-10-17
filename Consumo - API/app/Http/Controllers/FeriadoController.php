<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FeriadoController extends Controller
{
    public function index()
    {
        return view('feriados.index');
    }

    public function consultar(Request $request)
    {
        $validacao = $request->validate([
            'ano' => 'required|digits:4|integer|min:1900|max:2199',
        ]);
        $ano = $validacao['ano'];

        $resposta = Http::timeout(5)
            ->withoutVerifying()
            ->get("https://brasilapi.com.br/api/feriados/v1/{$ano}");

        $dados = $resposta->json();

        return view('feriados.index', ['feriados' => $dados]);
    }
}