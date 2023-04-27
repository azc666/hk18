<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Darryldecode\Cart\Facades\CartFacade;

class Rush extends Component
{
    public $datepickerValue;
    public $date;
    public $rush = false;
    public $saved = false;
    public $cartCollection;

    public $rules = [
        'date'  => 'nullable|date',
        'rush'  => 'nullable',
        'confirm' => 'required',
    ];

    public function mount()
    {

    }

    public function updatedRush()
    {
        Session::put('rush', $this->rush);
    }

    public function render()
    {
        $cal = '';
        $date = $this->date;
        $date = Session::put('date', $date);
        return view('livewire.rush', compact('cal'));
    }
}