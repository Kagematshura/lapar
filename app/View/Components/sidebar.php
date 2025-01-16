<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebar extends Component
{
    public $menuItems;

    /**
     * Create a new component instance.
     *
     * @param array $menuItems
     */
    public function __construct($menuItems = [])
    {
        $this->menuItems = $menuItems;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}
