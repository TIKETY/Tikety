<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bus;

class Search extends Component
{
    public $search= '';
    public $results= [];


    public function render()
    {
        $this->results = Bus::search($this->search)->get();
        return view('livewire.search');
    }
}
