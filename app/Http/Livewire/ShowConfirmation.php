<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShowConfirmation extends Component
{
    public $confirmation;
    public $created_at;
    public $orderId;
    public $cart;
    public $orderArray;
    public $orderArrayCount;
    public $savedCart;
    public $address_s;
    public $rush;


    public function showConfirmation()
    {
        Session::put('restoreOrder', true);

        $order = Order::get();

        $confirmation = session('confirmation');
        $created_at = session('created_at');
        $username = session('username');
        $name = session('name');
        $orderId = $this->orderId;
        $theCart = session('theCart');
        $contact_s = session('contact_s');
        $address_s = session('address_s');

        $order = Order::where('confirmation', $confirmation);
        // dd($order->pluck('confirmation'));
        $rush = $order->pluck('rush');
        // dd($rush);
        $cart = $this->cart;
        $cart = \Gloudemans\Shoppingcart\Facades\Cart::content();

        $orderArray = $this->orderArray;
        $orderArrayCount = $this->orderArrayCount;
        $orderArrayCount = Cart::content()->count() - 1;

        return view('livewire.show-confirmation', compact('confirmation', 'created_at', 'orderId', 'username', 'name', 'theCart', 'contact_s', 'address_s', 'rush'));
    }

    public function render()
    {
        return view('livewire.show-confirmation');
    }
}