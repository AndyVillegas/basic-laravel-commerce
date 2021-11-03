<?php

namespace App\View\Components\Order;

use Illuminate\View\Component;

class Table extends Component
{
    public $orders;
    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function render()
    {
        return view('components.order.table');
    }
}
