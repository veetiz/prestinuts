<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdottoAcquistato extends Model
{
    use HasFactory;

    protected $table = 'prodotti_acquistati';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'id_prodotto',
        'id_utente',
        'data_di_acquisto',
    ];

    protected $casts = [
        'id_prodotto' => 'integer',
        'id_utente' => 'integer',
    ];

    public function utente(): Model{
        return $this->belongsTo(Utente::class, 'id_utente', 'ID')->first();
    }

    public function prodotto(): Model{
        return $this->belongsTo(Prodotto::class, 'id_prodotto', 'ID')->first();
    }
}
