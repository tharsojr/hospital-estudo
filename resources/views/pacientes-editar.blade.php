<h1>Editar Paciente</h1>

<p> {{$paciente->nome}} </p>
<p> {{$paciente->idade}} </p>
<p> {{$paciente->cidade}} </p>
<p> {{$paciente->telefone}} </p>


<form method="POST" action="{{ route('pacientes.update', $paciente) }}">
  @csrf
  @method('PUT')

  <label for="nome">Nome:</label>
  <input
    type="text"
    id="nome"
    name="nome"
    value="{{ $paciente->nome }}">

  <br><br>

  <label for="idade">Idade:</label>
  <input
    type="number"
    id="idade"
    name="idade"
    value="{{ $paciente->idade }}">

  <br><br>

  <label for="cidade_id">Cidade:</label>

<select id="cidade_id" name="cidade_id">
    <option value="">Selecione</option>

    @foreach ($cidades as $cidade)
        <option
            value="{{ $cidade->id }}"
            {{ $paciente->cidade_id == $cidade->id ? 'selected' : '' }}
        >
            {{ $cidade->nome }} - {{ $cidade->uf }}
        </option>
    @endforeach
</select>

  <br><br>

  <label for="telefone">Telefone:</label>
  <input
    type="text"
    id="telefone"
    name="telefone"
    value="{{ $paciente->telefone }}"
    maxlength="12">

  <button type="submit">Salvar alterações</button>
</form>

<form method='POST' action="{{ route('pacientes.destroy', $paciente) }}" style="display:inline;">

  @csrf
  @method('DELETE')
  <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este paciente?')">
    Excluir
  </button>

</form>

<p>
  <a href="{{ route('pacientes.index', $paciente) }}">Voltar</a>
</p>