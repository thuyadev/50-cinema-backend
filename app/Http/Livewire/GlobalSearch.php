<?php

namespace App\Http\Livewire;

use App\Services\GlobalSearchService;
use Livewire\Component;

class GlobalSearch extends Component
{
    protected $globalSearchService;

    public $global_search = '';

    public function boot(GlobalSearchService $globalSearchService)
    {
        $this->globalSearchService = $globalSearchService;
    }

    public function render()
    {
        $datas = $this->globalSearchService->globalSearch($this->global_search);

        return view('livewire.global-search', compact('datas'));
    }
}
