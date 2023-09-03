@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{$prodotto->nome}}</div>

                    <div class="card-body">
                        <h2>Nome prodotto: {{$prodotto->nome}}</h2>
                        <h2>Prezzo: €{{$prodotto->prezzo}}</h2>
                        <h2>Descrizione: {{$prodotto->descrizione}}</h2>

                        <a role="button" class="btn btn-primary" href="{{route('acquista-prodotto', ['id_prodotto' => $prodotto->ID])}}">Acquista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
