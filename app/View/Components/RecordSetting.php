<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RecordSetting extends Component
{
    public $record;
    public $type ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($record,$type)
    {
        $this->record = $record;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.record-setting');
    }
}
