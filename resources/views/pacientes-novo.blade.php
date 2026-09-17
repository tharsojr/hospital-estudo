<h1>Novo Paciente</h1>

@if ($errors->any())
<div>
  @foreach ($errors->all() as $erro)
  <p>{{ $erro }}</p>
  @endforeach
</div>
@endif

<form method="POST" action="/pacientes">
  @csrf

  <label>Nome:</label>
  <input type="text" name="nome">

  <br><br>

  <label>Idade:</label>
  <input type="number" name="idade">

  <br><br>

  <label for="cidade_id">Cidade:</label>

<select id="cidade_id" name="cidade_id">
    <option value="">Selecione</option>

    @foreach ($cidades as $cidade)
        <option value="{{ $cidade->id }}">
            {{ $cidade->nome }} - {{ $cidade->uf }}
        </option>
    @endforeach
</select>
  <br><br>

  <label>Telefone:</label>
  <input type="text" name="telefone">

  <button type="submit">Salvar</button>
</form>

<p>
  <a href="{{ route('pacientes.index') }}">Voltar</a>
</p>