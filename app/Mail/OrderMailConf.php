<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMailConf extends Mailable
{
    use Queueable, SerializesModels;

    protected $dt_o;
    protected $confirmation;
    protected $savedCart;
    protected $adminEmail;
    protected $adminName;
    protected $orderArray;
    protected $pathToCartProof;
    protected $rushOrder;
    // protected $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($confirmation, $savedCart, $dt_o, $rush)
    {

        $this->dt_o = $dt_o;
        $this->confirmation = $confirmation;
        $this->savedCart = $savedCart;
        $this->rush = $rush;
        // $this->adminEmail = $adminEmail;
        // $this->adminName = $adminName;
        // $this->orderArray = $orderArray;
        // $this->pathToCartProof = $pathToCartProof;
        $order = new Order;
        $this->order = $order;
        // $rushOrder = $order->rush;
        // dd($rush);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $cart = Cart::content();
        return $this->from('support@g-d.com')
            ->subject('Order Portal Confirmation: ' . $this->confirmation)
            ->cc('output@g-d.com')
            ->bcc('azc99@me.com')
            ->view('emails.order-confirm')
            ->with(['confirmation' => $this->confirmation, 'savedCart' => $this->savedCart, 'dt_o' => $this->dt_o, 'rush' => $this->rush, 'cart' => $cart]);
    }
}
