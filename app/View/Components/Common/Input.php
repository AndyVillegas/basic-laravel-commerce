<?php

namespace App\View\Components\Common;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $label;
    public $value;
    public $required;
    public $type;

    public function __construct($name, $label = null, $required = false, $value = null, $type="text")
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.common.input');
    }
}
