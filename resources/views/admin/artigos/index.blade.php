@extends('layouts.app')

@section('content')
<Pagina tamanho=12>
  <painel titulo="Lista de Artigos" cor="blue">
    <migalhas :lista="{{ $listaMigalhas }}"></migalhas>
    <modal-link tipo='link' nome='meuModalTeste' titulo='Criar' css=''></modal-link>
    <tabela-lista :titulos=" ['#', 'Titulo' , 'Descrição' , 'Autor' ]"
      :itens="[[1,'LARAVEL 101', 'CURSO DE LARAVEL', 'Udemy'], [2,'VueJS Avançado', 'CURSO DE VueJS com Laravel', 'Udemy']]"
      criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="45646768765" ordem='DESC'
      ordem-col=1>
    </tabela-lista>
  </painel>
</Pagina>

<modal nome="meuModalTeste">
  <painel titulo="Adicionar">
    <form>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Example select</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect2">Example multiple select</label>
        <select multiple class="form-control" id="exampleFormControlSelect2">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
    </form>
  </painel>
</modal>
@endsection