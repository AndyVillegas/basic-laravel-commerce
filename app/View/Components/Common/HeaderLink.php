<?php

namespace App\View\Components\Common;

use Illuminate\View\Component;

class HeaderLink extends Component
{
    public $active;
    public function __construct($active=false)
    {
        $this->active = $active;
    }

    public function render()
    {
        return <<<'blade'
        <a {{ $attributes->class(['hover:border-b-4 border-0 border-blue-700 block py-3 px-4','border-b-4'=> $active]) }}>
            {{ $slot }}
        </a>
        blade;
    }
}
