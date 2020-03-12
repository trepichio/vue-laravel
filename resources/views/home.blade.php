@extends('layouts.app')

@section('content')
<div class="container">
    <Pagina tamanho=9>
        <painel titulo="Dashboard" cor="orange">
            Teste de conteúdo

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
    </Pagina>
</div>
@endsection