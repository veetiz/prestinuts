<?php

namespace App\Http\Controllers;

use App\Models\ProdottoAcquistato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UtenteController extends Controller
{
    public function __construct(){

    }

    public function acquistaProdotto(Request $request){
        try {
            $v = Validator::make($request->all(), [
                'id_prodotto' => ['required', 'integer', Rule::exists('prodotti', 'ID')]
            ])->validate();

            $pa = new ProdottoAcquistato();
            $pa->id_utente = auth()->user()->ID;
            $pa->id_prodotto = $v['id_prodotto'];

            $pa->save();

            return view('prodotti.prodotto-acquistato')->with([
                'ordine' => $pa,
                'prodotto' => $pa->prodotto()
            ]);
        } catch (ValidationException $e) {
            return back();
        }
    }
}
