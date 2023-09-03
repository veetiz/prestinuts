<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorie';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'nome'
    ];

    public function prodotti(): HasMany
    {
        return $this->hasMany(Prodotto::class, 'id_prodotto', 'ID');
    }
}
