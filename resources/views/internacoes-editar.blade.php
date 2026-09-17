<h1>Editar Internação</h1>

<form method="POST" action="{{ route('internacoes.update', $internacao) }}">
    @csrf
    @method('PUT')

    <label for="data_entrada">Data de entrada:</label>
    <input
        type="date"
        id="data_entrada"
        name="data_entrada"
        value="{{ $internacao->data_entrada }}"
    >

    <br><br>

    <label for="data_saida">Data de saída:</label>
    <input
        type="date"
        id="data_saida"
        name="data_saida"
        value="{{ $internacao->data_saida }}"
    >
<p></p>
<a href="{{ route('internacoes.alta.form', $internacao) }}" class="btn">
    Dar alta
</a>

<p></p>
    <button type="submit">Salvar alterações</button>
</form>