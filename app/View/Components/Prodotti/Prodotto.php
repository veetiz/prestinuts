<?php

namespace App\View\Components\Prodotti;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Prodotto extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $nome,
        public string $descrizione,
        public float $prezzo,
        public string $categoria,
        public int $id
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.prodotti.prodotto');
    }
}
