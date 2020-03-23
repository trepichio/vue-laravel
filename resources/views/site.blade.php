@extends('layouts.app')

@section('content')
<pagina tamanho=12>
    <painel titulo="Artigos">
        <div class="row">
            @foreach ($listaArtigos as $item => $value)
            <artigo-card titulo="{{ Str::limit($value->titulo,25, '(...)') }}"
                image-path="https://dummyimage.com/200.jpg" alt="uma imagem"
                link="{{ route('artigo', [$value->id, Str::slug($value->titulo, '-')]) }}" data='{{$value->data}}'
                autor='{{$value->autor}}' sm='6' md=4 conteudo="{{Str::limit($value->descricao, 40, '(...)')}}">
            </artigo-card>

            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $listaArtigos}}
        </div>
    </painel>
</pagina>
@endsection