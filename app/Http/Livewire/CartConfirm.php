<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartConfirm extends Component
{
    protected function rules()
    {
        return [
            'confirm' => 'accetpted',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        Session::put('saveCart', false);

        return view('livewire.cart-confirm');
    }
}