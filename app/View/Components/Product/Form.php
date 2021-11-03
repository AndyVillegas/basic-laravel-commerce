<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Form extends Component
{
    public $isEdit;
    public $product;
    public $categories;
    public function __construct($categories, $isEdit = false, $product=null)
    {
        $this->categories = $categories;
        $this->isEdit = $isEdit;
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.form',[
            'textButton'=>$this->isEdit?__('Update'):__('Save')
        ]);
    }
}
