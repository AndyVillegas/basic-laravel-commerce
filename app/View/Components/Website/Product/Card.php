<?php

namespace App\View\Components\Website\Product;

use Illuminate\View\Component;

class Card extends Component
{
    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('components.website.product.card');
    }
}
