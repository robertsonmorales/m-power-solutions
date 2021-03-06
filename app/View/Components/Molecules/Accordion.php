<?php

namespace App\View\Components\Molecules;

use Illuminate\View\Component;

class Accordion extends Component
{
    public $navigations;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($navigations)
    {
        $this->navigations = $navigations;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.molecules.accordion');
    }
}
