<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paciente;
use App\Models\Internacao;

class InternacaoController extends Controller
{
    public function create(Paciente $paciente)
    {
        $pacientes = Paciente::all();

        return view('internacoes-novo', [
            'paciente' => $paciente
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_entrada' => 'required|date',
            'data_saida' => 'nullable|date',
        ]);

        $internacao = new Internacao;

        $internacao->paciente_id = $request->paciente_id;
        $internacao->data_entrada = $request->data_entrada;
        $internacao->data_saida = $request->data_saida;

        $internacao->save();

        return redirect()->route('pacientes.show', $internacao->paciente_id);
    }

    public function index()
    {
        $internacoes = Internacao::all();

        return view('internacoes', [
            'internacoes' => $internacoes
        ]);
    }

    public function edit(Internacao $internacao)
    {
        return view('internacoes-editar', [
            'internacao' => $internacao
        ]);
    }

    public function update(Request $request, Internacao $internacao)
    {
        $request->validate([
            'data_entrada' => 'required|date',
            'data_saida' => 'nullable|date',
        ]);

        $internacao->data_entrada = $request->data_entrada;
        $internacao->data_saida = $request->data_saida;
        $internacao->save();

        return redirect()->route('internacoes.index')
            ->with('success', 'Internação atualizada com sucesso.');
    }

    public function destroy(Internacao $internacao)
    {
        $internacao->delete();

        return redirect()->route('internacoes.index')
            ->with('success', 'Internação excluída com sucesso.');
    }

    public function altaForm(Internacao $internacao)
    {
        return view('internacoes-alta', [
            'internacao' => $internacao
        ]);
    }               

   public function alta(Request $request, Internacao $internacao)
{

    if ($internacao->data_saida !== null) {
    
        return redirect()->route('internacoes.index')
            ->with('success', 'Alta já registrada para esta internação.');
    }

    $request->validate([
        'data_saida' => 'required|date|after_or_equal:' . $internacao->data_entrada,
    ]);

    $internacao->data_saida = $request->data_saida;
    $internacao->save();

    return redirect()->route('internacoes.index')
    ->with('success', 'Alta registrada com sucesso.');
}
}
