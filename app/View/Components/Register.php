<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Register extends Component
{
    public $action;
    public $title;
    public $add;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action,$title,$add)
    {
        $this->action=$action;
        $this->add=$add;
        $this->title=$title ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.register');
    }
}
