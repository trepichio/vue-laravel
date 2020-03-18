@extends('layouts.app')

@section('content')
<Pagina tamanho=12>
  <painel titulo="Lista de Artigos" cor="blue">
    <migalhas :lista="{{ $listaMigalhas }}"></migalhas>

    <tabela-lista :titulos=" ['#', 'Titulo' , 'Descrição', 'Autor', 'Data' ]" :itens="{{ $listaArtigos }}"
      criar=" #criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="45646768765" ordem='DESC'
      ordem-col=1 modal="true">
    </tabela-lista>

  </painel>
</Pagina>

<modal nome="adicionar" titulo="Adicionar">
  <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype=""
    token="{{ csrf_token() }}">
    <div class="form-group">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
    </div>
    <div class="form-group">
      <label for="conteudo">Conteúdo</label>
      <textarea class="form-control" id="conteudo" name="conteudo"></textarea>
    </div>
    <div class="form-group">
      <label for="autor">Autor</label>
      <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor">
    </div>
    <div class="form-group">
      <label for="data">Data</label>
      <input type="datetime-local" class="form-control" id="data" name="data">
    </div>
  </formulario>
  <span slot="botoes">
    <button form="formAdicionar" type="submit" class="btn btn-info">Adicionar</button>
  </span>
</modal>

<modal nome="editar" titulo="Editar">
  <formulario id="formEditar" css="" action="#" method="put" enctype="multipart/form-data" token="123456">
    <div class="form-group">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo"
        placeholder="Título">
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" id="descricao" v-model="$store.state.item.descricao"
        placeholder="Descrição">
    </div>
    <div class="form-group">
      <label for="autor">Autor</label>
      <input type="text" class="form-control" id="autor" name="autor" v-model="$store.state.item.autor"
        placeholder="Autor">
    </div>
    <div class="form-group">
      <label for="data">Data</label>
      <input type="date" class="form-control" id="data" v-model="$store.state.item.data" placeholder="Data">
    </div>
  </formulario>
  <span slot="botoes"><button form="formEditar" type="submit" class="btn btn-info">Editar</button></span>
</modal>

<modal nome="detalhe" :titulo="$store.state.item.titulo">
  <p>@{{$store.state.item.descricao}} -
    @{{$store.state.item.autor}} -
    @{{$store.state.item.data}}</p>
</modal>
@endsection