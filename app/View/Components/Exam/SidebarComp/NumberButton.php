<?php

namespace App\View\Components\Exam\SidebarComp;

use Illuminate\View\Component;

class NumberButton extends Component
{
    // attributes =========
    public $questionType;
    public $target;
    public $number;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($questionType, $target, $number)
    {
        $this->questionType = $questionType;
        $this->target = $target;
        $this->number = $number;
    }

    public function isFirstListeningButton($number, $questionType)
    {
        return $number === 1 && $questionType === "listening";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.exam.sidebar-comp.number-button');
    }
}
