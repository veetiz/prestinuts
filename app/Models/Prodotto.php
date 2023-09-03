<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model
{
    use HasFactory;

    protected $table = 'prodotti';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'descrizione',
        'prezzo',
        'id_utente',
        'id_categoria',
        'stock'
    ];

    protected $casts = [
        'id_utente' => 'integer',
        'id_categoria' => 'integer',
        'prezzo' => 'double',
        'stock' => 'integer'
    ];

    public function categoria(): Model{
        return $this->belongsTo(Categoria::class, 'id_categoria', 'ID')->first();
    }

    public function utente(): Model{
        return $this->belongsTo(Utente::class, 'id_utente', 'ID')->first();
    }
}
