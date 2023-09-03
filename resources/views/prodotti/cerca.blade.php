@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Cerca prodotto: </div>

                    <div class="card-body">
                        @if(!$ricerca)
                            <div class="alert alert-primary" role="alert">
                                Inserisci un prodotto da cercare...
                            </div>
                        @elseif(!sizeof($prodotti))
                            <div class="alert alert-danger" role="alert">
                                Nessun risultato trovato!
                            </div>
                        @else
                            @foreach($prodotti as $p)
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xl-3">
                                        <x-prodotti.prodotto
                                            :id="1"
                                            :nome="$p->nome"
                                            :descrizione="$p->descrizione"
                                            :prezzo="$p->prezzo"
                                            :categoria="$p->categoria()->nome"
                                        />
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
