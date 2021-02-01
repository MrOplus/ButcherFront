<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppBar extends Component
{
    public $record;
    public $zone;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($record = -1,$zone = -1)
    {
        $this->record = $record;
        $this->zone = $zone;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.appbar');
    }
}
