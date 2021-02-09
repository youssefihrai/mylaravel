<?php

namespace App\View\Components;

use Illuminate\View\Component;

class errors extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $myClass;
    public function __construct($myClass)
    {
    $this->myClass=$myClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.errors');
    }
}
