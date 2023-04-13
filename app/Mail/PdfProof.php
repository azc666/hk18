<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;

class PdfProof extends Mailable
{
    use Queueable, SerializesModels;

    public $imgToEmail;
    public $rowId;
    public $prodName;
    public $bcName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($imgToEmail, $prodName, $bcName)
    {
        // $rowId = $this->rowId;
        // $rowId = session('rowId');
        // dd(Cart::content()->get($rowId));
        // $row = Cart::get('rowId');
        // dd($prod_id);


        $this->imgToEmail = $imgToEmail;
        $this->prodName = $prodName;
        $this->bcName = $bcName;
        // $imgToEmail = $rowId->options->pathToCartProof;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('output@g-d.com')
            ->subject('PDF Proof for the ' . $this->prodName)
            // ->cc('output@g-d.com')
            ->bcc('azc99@me.com')
            ->view('emails.pdf-proof')
            ->with(['imgToEmail' => $this->imgToEmail, 'prodName' => $this->prodName, 'bcName' => $this->bcName]);
    }
}