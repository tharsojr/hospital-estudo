<h1>Dar alta</h1>

<p>Paciente: {{ $internacao->paciente->nome }}</p>

<p>Data de entrada: {{ $internacao->data_entrada }}</p>

<form method="POST" action="{{ route('internacoes.alta', $internacao) }}">
    @csrf

    <input type="hidden" name="_method" value="PATCH">

    <label for="data_saida">Data da alta:

      <input
    type="date"
    id="data_saida"
    name="data_saida"
    value="{{ date('Y-m-d') }}"
>
    </label>
    
    <button type="submit">Confirmar alta</button>
</form>