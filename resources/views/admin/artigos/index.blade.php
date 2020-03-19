@extends('layouts.app')

@section('content')
<Pagina tamanho=12>
  @if($errors->all())

  <div class="alert-danger alert-dismissible fade show text-center mb-2" role="alert">

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="container py-2">

      <strong>Vish! Algo está errado.</strong> Verifique o preenchimento dos campos abaixo.
      @foreach ($errors->all() as $key => $value)

      <li><strong>{{$value}}</strong></li>
      @endforeach
    </div>



  </div>

  @endif
  <painel titulo="Lista de Artigos" cor="blue">
    <migalhas :lista="{{ $listaMigalhas }}"></migalhas>

    <tabela-lista :titulos=" ['#', 'Titulo' , 'Descrição', 'Autor', 'Data' ]" :itens="{{ $listaArtigos }}"
      criar=" #criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="#deletar" token="45646768765"
      ordem='DESC' ordem-col=1 modal="true">
    </tabela-lista>

  </painel>
</Pagina>

<modal nome="adicionar" titulo="Adicionar">
  <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype=""
    token="{{ csrf_token() }}">
    <div class="form-group">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título"
        value="{{ old('titulo') }}">
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição"
        value="{{ old('descricao') }}">
    </div>
    <div class="form-group">
      <label for="conteudo">Conteúdo</label>
      <textarea class="form-control" id="conteudo" name="conteudo">{{ old('conteudo') }}</textarea>
    </div>
    <div class="form-group">
      <label for="autor">Autor</label>
      <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor" value="{{ old('autor') }}">
    </div>
    <div class="form-group">
      <label for="data">Data</label>
      <input type="datetime-local" class="form-control" id="data" name="data" value="{{ old('data') }}">
    </div>
  </formulario>
  <span slot="botoes">
    <button form="formAdicionar" type="submit" class="btn btn-info">Adicionar</button>
  </span>
</modal>

<modal nome="editar" titulo="Editar">
  <formulario id="formEditar" css="" :action="`admin/artigos/${$store.state.item.id}`" method="put" enctype=""
    token="{{ csrf_token() }}">
    <div class="form-group">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo"
        placeholder="Título">
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao"
        placeholder="Descrição">
    </div>
    <div class="form-group">
      <label for="conteudo">Conteúdo</label>
      <textarea class="form-control" id="conteudo" name="conteudo" v-model="$store.state.item.conteudo"></textarea>
    </div>
    <div class="form-group">
      <label for="autor">Autor</label>
      <input type="text" class="form-control" id="autor" name="autor" v-model="$store.state.item.autor"
        placeholder="Autor">
    </div>
    <div class="form-group">
      <label for="data">Data</label>
      <input type="datetime-local" class="form-control" id="data" name="data" v-model="$store.state.item.data"
        value="{{ value('data') }}">
    </div>
  </formulario>
  <span slot=" botoes"><button form="formEditar" type="submit" class="btn btn-info">Atualizar</button></span>
</modal>

<modal nome="detalhe" :titulo="$store.state.item.titulo">
  <p>@{{$store.state.item.descricao}}</p>
  <p>
    @{{$store.state.item.conteudo}}
  </p>
  </p>
  <p>@{{$store.state.item.autor}} - @{{$store.state.item.data}}</p>
</modal> @endsection