@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Vendi nuovo prodotto</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-sm-12">

                            </div>
                            <div class="col-6 col-sm-12">
                                <form method="POST" action="{{ route('carica-prodotto') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="nome" class="col-md-4 col-form-label text-md-end">Nome</label>

                                        <div class="col-md-6">
                                            <input id="nome" type="text" maxlength="20" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                            @error('nome')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="prezzo" class="col-md-4 col-form-label text-md-end">Prezzo</label>

                                        <div class="col-md-6">
                                            <input id="prezzo" type="number" class="form-control @error('prezzo') is-invalid @enderror" name="prezzo" value="{{ old('prezzo') }}" required autocomplete="prezzo" autofocus>

                                            @error('prezzo')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="stock" class="col-md-4 col-form-label text-md-end">Quantità</label>

                                        <div class="col-md-6">
                                            <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') ?? 1}}" required autocomplete="stock" autofocus>

                                            @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="categoria" class="col-md-4 col-form-label text-md-end">Categoria</label>

                                        <div class="col-md-6">
                                            <select id="categoria" class ="form-control @error('categoria') is-invalid @enderror" name="categoria" required>
                                                <option selected>Scegli una categoria...</option>
                                                @foreach($categorie as $categoria)
                                                    <option value="{{$categoria->ID}}">{{$categoria->nome}}</option>
                                                @endforeach
                                            </select>

                                            @error('categoria')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="descrizione" class="col-md-4 col-form-label text-md-end">Descrizione</label>

                                        <div class="col-md-6">
                                            <textarea id="descrizione" name="descrizione" rows="5" class="form-control @error('descrizione') is-invalid @enderror" required >{{ old('descrizione') ?? ''}}</textarea>
                                            @error('prezzo')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Accedi
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
