<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListShow extends Component
{
    public $items;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items=null)
    {
        $this->items=$items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.list-show');
    }
}
