<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $headers;
    public $rows;

    public $hasActions;
    public $actions;

    public function __construct(array $headers, array $rows, $actions = null)
    {
        $this->headers = $headers;
        $this->rows = $rows;
        $this->hasActions = $actions !== null;
        $this->actions = $actions;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.table');
    }
}
