<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeaderComponent extends Component
{
    public $pageName;
    public $btnName;
    public $pageLink;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($btnName, $pageName, $pageLink)
    {
        $this->btnName = $btnName;
        $this->pageName = $pageName;
        $this->pageLink = $pageLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-header-component');
    }
}
