<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MasterHeader extends Component
{

    // public string $headerText;
    // /**
    //  * Create a new component instance.
    //  */
    // public function __construct($headerText = 'Hello...')
    // {
    //     $this->headerText = $headerText;
    // }


    public function __construct(public string $headerText = 'Hello...')
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('guest.components.master-header');
    }
}