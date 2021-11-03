<?php

namespace App\View\Components\Category;

use Illuminate\View\Component;

class Table extends Component
{
    public $categories;
    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    public function render()
    {
        return view('components.category.table');
    }
}
