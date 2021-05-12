<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PragmaRX\Countries\Package\Services\Countries;


class Travel extends Component
{
    public $from;
    public $to;

    public function travel(){
        return redirect()->to('/'.app()->getLocale().'/travel/'.$this->from.'/'.$this->to);
    }

    public function render()
    {
        $countries = new Countries;
        $states = $countries->whereNameCommon('Tanzania')->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        return view('livewire.travel', compact('states'));
    }
}
