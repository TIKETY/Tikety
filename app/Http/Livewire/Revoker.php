<?php

namespace App\Http\Livewire;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Bus;

class Revoker extends Component
{
    public $seat;
    public $busid;

    public function revoke(){
        $bus = Bus::find($this->busid);
        $bus->revokeSeat($this->seat);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Feedback Saved',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
            ]);
    }

    public function render()
    {
        return view('livewire.revoker');
    }
}
