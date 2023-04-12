<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductionMailConf extends Mailable
{
    use Queueable, SerializesModels;

    protected $dt_o;
    protected $confirmation;
    protected $savedCart;
    protected $adminEmail;
    protected $adminName;
    protected $order_array;
    protected $order_array_count;
    protected $pathToCartProof;
    protected $address_s;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($confirmation, $savedCart, $dt_o, $order_array, $order_array_count, $address_s)
    {

        $this->dt_o = $dt_o;
        $this->confirmation = $confirmation;
        $this->savedCart = $savedCart;
        $this->order_array = $order_array;
        $this->order_array_count = $order_array_count;
        $this->address_s = $address_s;
        // $this->adminEmail = $adminEmail;
        // $this->adminName = $adminName;
        // $this->order_array = $order_array;
        // $this->pathToCartProof = $pathToCartProof;
        $order = new Order;
        // $this->order = $order;
        // $order_array = unserialize($order->order_array);
// dd($order_array);
// dd($order_array[count($order_array) - 1]['order_type_o']);
// dd($order_array[0]['name_o']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('output@g-d.com')
        // return $this->from('allen@g-d.com')
        ->subject('Portal Production Details, Confirmation: ' . $this->confirmation)
            ->cc('output@g-d.com')
            // ->cc('azc666@gmail.com')
            ->bcc('azc99@me.com')
            ->view('emails.production-details')
            ->with(['confirmation' => $this->confirmation, 'savedCart' => $this->savedCart, 'dt_o' => $this->dt_o, 'order_array' => $this->order_array, 'order_array_count' => $this->order_array_count, 'address_s' => $this->address_s]);
        // return $this->view('view.name');
    }
}
