<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Prodotto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class ProdottiController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function cercaProdotto(Request $request){
        $prodotti = Prodotto::where("nome","LIKE","%{$request->get('nome')}%")->get();
        $ricerca = $request->get('nome');

        return view('prodotti.cerca', compact('prodotti', 'ricerca'));
    }

    public function visualizzaProdotto(Request $request, int $ID){
        $prodotto = Prodotto::find($ID);

        return view('prodotti.visualizza', compact('prodotto'));
    }

    public function vendiProdotto(){
        $categorie = Categoria::all();

        return view('prodotti.vendi', compact('categorie'));
    }


    public function caricaProdotto(Request $request){
        try{
            $data = Validator::make($request->post(), [
                'nome' => ['required', 'min:3', 'string'],
                'prezzo' => ['required', 'between:0,99999.99'],
                'descrizione' => ['required'],
                'categoria' => ['required', 'integer', Rule::exists('categorie', 'ID')],
                'stock' => ['nullable', 'number']
            ])->validate();

            $prodotto = new Prodotto();

            $prodotto->nome = $data['nome'];
            $prodotto->prezzo = $data['prezzo'];
            $prodotto->descrizione = $data['descrizione'];
            $prodotto->stock = $data['stock'];

            $prodotto->id_categoria = $data['categoria'];
            $prodotto->id_utente = auth()->get('ID');

            $prodotto->save();

            return to_route('visualizza-prodotto', ['ID' => $prodotto->ID]);
        }catch(ValidationException $e){
            return
                to_route('vendi-prodotto')
                ->withErrors($e->errors());
        }
    }
}
