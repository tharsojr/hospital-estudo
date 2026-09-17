<?php

namespace App\Http\Controllers;

use App\Models\Cidade;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
        public function index(Request $request)
{
    $titulo = 'Lista de Pacientes';

    $pacientes = Paciente::query();

    $cidades = Cidade::orderBy('nome')->get();

    if ($request->cidade_id) {
        $pacientes->where('cidade_id', $request->cidade_id);
    }

    $pacientes = $pacientes->orderBy('nome')->get();

    return view('pacientes', [
        'titulo' => $titulo,
        'pacientes' => $pacientes,
        'cidades' => $cidades
    ]);
}
    public function create()
{
    $cidades = Cidade::orderBy('nome')->get();

    return view('pacientes-novo', [
        'titulo' => 'Novo Paciente',
        'cidades' => $cidades
    ]);
}

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'idade' => 'required|integer',
            'cidade_id' => 'required|exists:cidades,id',
            'telefone' => 'nullable|string|max:15',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'idade.required' => 'O campo idade é obrigatório.',
            'idade.integer' => 'O campo idade deve ser um número inteiro.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'telefone.string' => 'O campo telefone deve ser uma string.',
            'telefone.max' => 'O campo telefone deve ter no máximo 15 caracteres.',
        ]);

        $paciente = new Paciente;

        $paciente->nome = $request->nome;
        $paciente->idade = $request->idade;
        $paciente->cidade_id = $request->cidade_id;
        $paciente->telefone = $request->telefone;

        $paciente->save();

        return redirect('/pacientes');
    }

    public function edit(Paciente $paciente)
{
    $cidades = Cidade::orderBy('nome')->get();

    return view('pacientes-editar', [
        'paciente' => $paciente,
        'cidades' => $cidades
    ]);
}

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nome' => 'required',
            'idade' => 'required|integer',
            'cidade_id' => 'required|exists:cidades,id',
            'telefone' => 'nullable|string|max:20',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'idade.required' => 'O campo idade é obrigatório.',
            'idade.integer' => 'O campo idade deve ser um número inteiro.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'telefone.string' => 'O campo telefone deve ser uma string.',
            'telefone.max' => 'O campo telefone deve ter no máximo 20 caracteres.',
        ]);


        $paciente->nome = $request->nome;
        $paciente->idade = $request->idade;
        $paciente->cidade_id = $request->cidade_id;
        $paciente->telefone = $request->telefone;
        $paciente->save();

        

        
        



        return redirect('/pacientes');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect('/pacientes');

    }

    public function show(Paciente $paciente)
    {
        return view('pacientes-ver', [
            'paciente' => $paciente
        ]);
    }

    public function filter(Request $request)
    {
        $pacientes = Paciente::query();
        
        if ($request->filled('cidade')) {
            $pacientes->where('cidade', $request->input('cidade'));
        }

        $pacientes = $pacientes->orderBy('nome')->get();

        return view('pacientes', [
            'titulo' => 'Lista de Pacientes',
            'pacientes' => $pacientes
        ]);
        
    }
}
