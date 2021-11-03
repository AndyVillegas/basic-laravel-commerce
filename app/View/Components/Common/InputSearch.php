<?php

namespace App\View\Components\Common;

use Illuminate\View\Component;

class InputSearch extends Component
{
    public $action;
    public function __construct($action)
    {
        $this->action = $action;
    }

    public function render()
    {
        return view('components.common.input-search');
    }
}
