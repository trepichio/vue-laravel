@extends('layouts.app')

@section('content')
<Pagina tamanho=12>
  <painel titulo="Artigos" cor="blue">
    Lista de artigos
    <tabela-lista :titulos="['#', 'Titulo', 'Descrição', 'Autor']"
      :itens="[[1,'LARAVEL 101', 'CURSO DE LARAVEL', 'Udemy'], [2,'VueJS Avançado', 'CURSO DE VueJS com Laravel', 'Udemy']]"
      criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="45646768765" ordem='DESC'
      ordem-col=1>
    </tabela-lista>
  </painel>
</Pagina>
@endsection