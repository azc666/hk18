<?php

namespace App\Http\Livewire;

use Request;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Rush extends Component
{
    public $datepickerValue;
    public $date;
    public $rush = false;

    public function mount()
    {
        $datepickerValue = $this->datepickerValue;

    }

    public function updatedRush()
    {
        // $this->rush = !$this->rush;
        Session::put('rush', $this->rush);
    }

    public function render()
    {
        return view('livewire.rush');
    }
}