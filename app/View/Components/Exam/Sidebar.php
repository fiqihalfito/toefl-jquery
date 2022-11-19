<?php

namespace App\View\Components\Exam;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public $questions;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($questions)
    {
        $this->questions = $questions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.exam.sidebar');
    }
}
