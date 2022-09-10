<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreatedAtCardComponent extends Component
{
    public $createdAt;
    public $modifiedAt;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($createdAt = '-', $modifiedAt = '-')
    {
        $this->createdAt = $createdAt;
        $this->modifiedAt = $modifiedAt;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.created-at-card-component');
    }
}
