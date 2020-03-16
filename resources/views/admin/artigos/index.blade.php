@extends('layouts.app')

@section('content')
<Pagina tamanho=12>
  <painel titulo="Lista de Artigos" cor="blue">
    <migalhas :lista="{{ $listaMigalhas }}"></migalhas>

    <tabela-lista :titulos=" ['#', 'Titulo' , 'Descrição' , 'Autor', 'Data' ]" :itens="{{ $listaArtigos }}"
      criar=" #criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="45646768765" ordem='DESC'
      ordem-col=1 modal="true">
    </tabela-lista>

  </painel>
</Pagina>

<modal nome="adicionar" titulo="Adicionar">
  <formulario id="formAdicionar" css="" action="#" method="put" enctype="multipart/form-data" token="123456">
    <div class="form-group">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" id="descricao" placeholder="Descrição">
    </div>
  </formulario>
  <span slot="botoes">
    <button form="fromAdicionar" type="submit" class="btn btn-info">Adicionar</button>
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
  </formulario>
  <span slot="botoes"><button form="formEditar" type="submit" class="btn btn-info">Editar</button></span>
</modal>

<modal nome="detalhe" :titulo="$store.state.item.titulo">
  <p>@{{$store.state.item.descricao}}</p>
</modal>
@endsection