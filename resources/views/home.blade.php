@extends('layouts.app')

@section('content')
<div class="container">
    <pagina tamanho=9>
        <painel titulo="Dashboard" cor="orange">
            <migalhas :lista="{{ $listaMigalhas }}"></migalhas>

            <div class="row">
                <div class="col-md-4">
                    <caixa :qtd="{{$qtdArtigos}}" cor="orange" url="{{ route('artigos.index') }}"
                        icone="fa fa-shopping-cart" titulo="Artigos">
                    </caixa>

                </div>
                <div class="col-md-4">
                    <caixa :qtd="{{$qtdUsuarios}}" cor="blue" url="{{ route('usuarios.index') }}"
                        icone="ion ion-person-stalker" titulo="Usuarios"></caixa>

                </div>
                <div class="col-md-4">
                    <caixa :qtd="{{$qtdAutores}}" cor="green" url="{{ route('autores.index') }}" icone="ion ion-edit"
                        titulo="Autores">
                    </caixa>

                </div>

            </div>
        </painel>
    </pagina>
</div>
@endsection