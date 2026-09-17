<h1>Nova Internação</h1>

<form method="POST" action="{{ route('internacoes.store') }}">
  @csrf

  <label for="paciente_id">Paciente: {{$paciente->nome}} </label>

  <input type="hidden" id="paciente_id" name="paciente_id" value="{{ $paciente->id }}">

 
  <br><br>

  <label for="data_entrada">Data de entrada:</label>
  <input type="date" id="data_entrada" name="data_entrada">

  <br><br>

  <label for="data_saida">Data de saída:</label>
  <input type="date" id="data_saida" name="data_saida">

  <br><br>

  <button type="submit">Salvar internação</button>
</form>

<p>
  <a href="{{ route('internacoes.index') }}">Voltar</a>
</p>