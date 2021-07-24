<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{

    public $name;
    public $title;
    public $default;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $name = '', $default = null)
    {
        $this->name = $name;
        $this->title = $title;
        $this->default = $default;
    }

    // public function hasError(): bool
    // {
    //     dd(session('errors')[$this->name]);
    // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
