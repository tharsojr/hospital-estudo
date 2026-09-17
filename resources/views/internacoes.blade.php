@extends('layouts.app')

@section('titulo', 'Pacientes')

@section('conteudo')

<h1>Internações</h1>

@if (session()->has('success'))
<p>{{ session('success') }}</p>
@endif

<table border="1">
  <tr>
    <th>Paciente</th>
    <th>Data de entrada</th>
    <th>Data de saída</th>
    <th>Ações</th>
  </tr>

  @foreach ($internacoes as $internacao)
  <tr>
    <td>{{ $internacao->paciente->nome }}</td>

    <td>{{ \Carbon\Carbon::parse($internacao->data_entrada)->format('d/m/Y') }}</td>

    <td>
    {{ $internacao->data_saida
        ? \Carbon\Carbon::parse($internacao->data_saida)->format('d/m/Y')
        : 'Internado'
    }}
</td>

    <td>
      <a href="{{ route('internacoes.edit', $internacao) }}">Editar</a>

      @if (is_null($internacao->data_saida))
    <a href="{{ route('internacoes.alta.form', $internacao) }}" class="btn">
        Dar alta
    </a>
@endif

    </td>
  </tr>
  @endforeach

</table>

<p>
  <a href="{{ route('pacientes.index') }}">Voltar</a>
</p>]

@endsection