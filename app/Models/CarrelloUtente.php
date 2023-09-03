<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrelloUtente extends Model
{
    use HasFactory;

    protected $table = 'carrelli_utente';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'id_prodotto',
        'id_utente'
    ];

    protected $casts = [
        'id_prodotto' => 'integer',
        'id_utente' => 'integer'
    ];

    public function utente(): Model{
        return $this->belongsTo(Utente::class, 'id_utente', 'ID')->first();
    }

    public function prodotto(): Model{
        return $this->belongsTo(Prodotto::class, 'id_prodotto', 'ID')->first();
    }
}
