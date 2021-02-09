<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card extends Component
{
    public $items;
    public $title;
    public $text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items=null,$title,$text)
    {
        $this->title=$title;
        $this->items=$items;
        $this->text=$text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
