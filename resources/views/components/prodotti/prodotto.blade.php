<div class="card" style="width: 18rem;">
    <img src="https://wemalossistore.blob.core.windows.net/imgproducts/3218858/3218858_store.jpg" class="card-img-top" alt="{{$nome}}">
    <div class="card-body">
        <h5 class="card-title">{{$nome}}</h5>
        <p class="card-text text-success">€{{$prezzo}}</p>
        <a href="{{route('visualizza-prodotto', ['ID' => $id ])}}" class="btn btn-primary">Visualizza</a>
    </div>
</div>
