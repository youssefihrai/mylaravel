<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LoginComponent extends Component
{
    public $action;
    public $title;
    public $register;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action,$title,$register=null)
    {
        $this->action=$action;
        $this->title=$title;
        $this->register=$register;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.login-component');
    }
}
