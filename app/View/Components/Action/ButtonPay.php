<?php

namespace App\View\Components\Action;

use Illuminate\View\Component;

class ButtonPay extends Component
{
    public $paid, $modal;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($paid, $modal)
    {
        $this->paid = $paid !== null ? 'd-none' : '';
        $this->modal = $modal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action.button-pay');
    }
}
