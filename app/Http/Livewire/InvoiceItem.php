<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Temp;

class InvoiceItem extends Component
{
    public $bus;
    public $seat;

    public function remove($seat_rm)
    {
        Temp::where('user_id', auth()->user()->id)->where('variable3', $seat_rm)->delete();

        $this->render();

        session()->flash('success_message', 'The seat was removed');
    }

    public function render()
    {
        $seats = Temp::where('user_id', auth()->user()->id)->pluck('variable3');

        return view('livewire.invoice-item', [
            'seats' => $seats,
            'bus'=> $this->bus // passing in variable into livewire view
        ]);
    }
}

