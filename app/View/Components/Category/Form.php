<?php

namespace App\View\Components\Category;

use Illuminate\View\Component;

class Form extends Component
{
    public $isEdit;
    public $category;
    public function __construct($isEdit = false, $category=null)
    {
        $this->isEdit = $isEdit;
        $this->category = $category;
    }

    public function render()
    {
        return view('components.category.form',[
            'textButton'=>$this->isEdit?__('Update'):__('Save')
        ]);
    }
}
