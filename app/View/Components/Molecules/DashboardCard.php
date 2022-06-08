<?php

namespace App\View\Components\Molecules;

use Illuminate\View\Component;

class DashboardCard extends Component
{
    public $text, $class, $textClass, $mode;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $class, $textClass, $mode)
    {
        $this->text = $text;
        $this->class = $class;
        $this->textClass = $textClass;
        $this->mode = $mode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.molecules.dashboard-card');
    }
}
