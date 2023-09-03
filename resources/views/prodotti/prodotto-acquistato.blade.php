@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Conferma di acquisto del prodotto</div>

                    <div class="card-body">
                        <h2>Nome prodotto: {{$prodotto->nome}}</h2>
                        <h2>Data di acquisto: {{$prodotto->data_di_acquisto}}</h2>
                        <h2>Prezzo: €{{$prodotto->prezzo}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
