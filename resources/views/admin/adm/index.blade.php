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
  <painel titulo="Lista de Administradores" cor="blue">
    <migalhas :lista="{{ $listaMigalhas }}"></migalhas>
    <tabela-lista :titulos=" ['#', 'Nome', 'E-mail']" :itens="{{ json_encode($listaModelo) }}" criar=" #criar"
      detalhe="/admin/adm/" editar="/admin/adm/" ordem='DESC' ordem-col=1 modal="true">
    </tabela-lista>
    <div class="d-flex justify-content-center">
      {{ $listaModelo}}
    </div>
  </painel>
</Pagina>

<modal nome="adicionar" titulo="Adicionar">
  <formulario id="formAdicionar" css="" action="{{route('adm.store')}}" method="post" enctype=""
    token="{{ csrf_token() }}">
    <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ old('name') }}">
    </div>
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
    </div>
    <div class="form-group">
      <label for="password">Senha</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
      <label for="addAdmin">Admin</label>
      <select class="form-control" id="addAdmin" name="admin">
        <option {{ (old('admin') && old('admin') == 'N' ? 'selected' : '') }} value="N">Não</option>
        <option {{ (old('admin') && old('admin') == 'S' ? 'selected' : 'selected') }} value="S">Sim</option>
      </select>
    </div>
  </formulario>
  <span slot="botoes">
    <button form="formAdicionar" type="submit" class="btn btn-info">Adicionar</button>
  </span>
</modal>

<modal nome="editar" titulo="Editar">
  <formulario id="formEditar" css="" :action="'/admin/adm/' + $store.state.item.id" method="put" enctype=""
    token="{{ csrf_token() }}">
    <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name">
    </div>
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" v-model="$store.state.item.email">
    </div>
    <div class="form-group">
      <label for="editAdmin">Admin</label>
      <select class="form-control" id="editAdmin" name="admin" v-model="$store.state.item.admin">
        <option value="N">Não</option>
        <option value="S">Sim</option>
      </select>
    </div>
    <div class="form-group">
      <label for="password">Senha</label>
      <input type="password" class="form-control" id="password" name="password"
        v-model="$store.state.item.password"></input>
    </div>
  </formulario>
  <span slot="botoes">
    <button form="formEditar" type="submit" class="btn btn-info">Atualizar</button>
  </span>
</modal>

<modal nome="detalhe" :titulo="$store.state.item.name">
  <p>@{{$store.state.item.email}}</p>
</modal> @endsection