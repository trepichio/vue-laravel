@extends('layouts.app')

@section('content')
<div class="container">
    <pagina tamanho=9>
        <painel titulo="Dashboard" cor="orange">
            <migalhas :lista="{{ $listaMigalhas }}"></migalhas>

            <div class="row">
                <div class="col-md-4">
                    <caixa qtd="80" cor="orange" url="{{ route('artigos.index') }}" icone="fa fa-shopping-cart"
                        titulo="Artigos">
                    </caixa>

                </div>
                <div class="col-md-4">
                    <caixa qtd="2500" cor="blue" url="#" icone="ion ion-person-stalker" titulo="Usuarios"></caixa>

                </div>
                <div class="col-md-4">
                    <caixa qtd="5" cor="green" url="#" icone="ion ion-edit" titulo="Autores"></caixa>

                </div>

            </div>
        </painel>
    </pagina>
</div>
@endsection