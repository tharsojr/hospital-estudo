<h1>Dados do Paciente</h1>

<p> {{$paciente->nome}} </p>
<p>Idade: {{$paciente->idade}} </p>
<p>Cidade: {{$paciente->cidade}} </p>
<p>Telefone: {{$paciente->telefone}} </p>


<h2> Internações </h2>

<p> <a href="{{ route('internacoes.create', $paciente) }}">Adicionar Internação </a> </p>

@foreach ($paciente->internacoes as $internacao)
<p>
  Internação: {{$internacao->id}}
</p>
Data de entrada: {{ \Carbon\Carbon::parse($internacao->data_entrada)->format('d/m/Y') }} <br>
|
Data de saída: {{ \Carbon\Carbon::parse($internacao->data_saida)->format('d/m/Y') ?? 'Internado'}} <br>

@endforeach

<h3> Total de internações: {{ $paciente->internacoes->count() }}

</h3>
@foreach ($paciente->internacoes as $internacao)
<p>
  Internação: {{$internacao->id}}
</p>
Data: {{ \Carbon\Carbon::parse($internacao->data_entrada)->format('d/m/Y') }} a {{ \Carbon\Carbon::parse($internacao->data_saida)->format('d/m/Y')}} <br>
<br>

@endforeach

<a href="{{ route('pacientes.edit', $paciente) }}">Editar</a>
<p> <a href="{{ route('pacientes.index', $paciente) }}">Voltar</a> </p>