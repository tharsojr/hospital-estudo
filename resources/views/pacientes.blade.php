@extends('layouts.app')

@section('titulo', 'Pacientes')

@section('conteudo')

    <h1>Pacientes</h1>


    <div>
        <p> {{$titulo}}
        </p>
    </div>

    <form method="GET" action="{{ route('pacientes.index') }}">
   <select name="cidade_id">

    <option value="">Todas</option>

    @foreach ($cidades as $cidade)

        <option
            value="{{ $cidade->id }}"
            @selected(request('cidade_id') == $cidade->id)
        >
            {{ $cidade->nome }}
        </option>

    @endforeach

</select>  

    <button type="submit">Filtrar</button>
</form>

    <table class="tabela">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Cidade</th>
            <th>Ações</th>
        </tr>


        @foreach ($pacientes as $paciente)


        <tr>
            <td>{{ $paciente['nome'] }}</td>
            <td>{{ $paciente['idade'] }}</td>
            <td>{{ $paciente->municipio?->nome ?? 'Sem cidade vinculada' }}</td>

            <td>

                <a href="{{route('pacientes.edit', $paciente)}}" class="btn">Editar</a>

                <a href="{{ route('pacientes.show', $paciente) }}" class="btn">Ver</a>

                <a href="{{ route('internacoes.create', $paciente) }}" class="btn">Adicionar Internação</a>

                <form method='POST' action="{{route('pacientes.destroy', $paciente)}}" style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este paciente?')" class="btn">
                        Excluir
                    </button>
                </form>
            </td>
        </tr>

        @endforeach

    </table class="tabela">

    <div>
    <p>
        <a href="{{ route('pacientes.create') }}" class="btn">Adicionar Paciente</a>
    </p>
</div>  

@endsection