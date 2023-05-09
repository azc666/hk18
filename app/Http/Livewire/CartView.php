<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Title;
use App\Mail\PdfProof;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Darryldecode\Cart\Cart;
// use Darryldecode\Cart\Facades\CartFacade as CartFacade;
use function GuzzleHttp\json_encode;

class CartView extends Component
{
    public $rowQty;
    public $cart;
    public $cartItem;
    public $rowId;
    public $qtyUpdate;
    public $cartItemRowId;
    public $row;
    public $qty;
    public $bcfyi_qty;
    public $getDateValue;
    public $errorMessage;
    public $rush = false;
    public $orderArray;
    public $order_array;
    public $order;
    public $restored;
    public $prod_layout;
    // public $order_type_o;
    // public $quantity;
    // public $prod_layout;
    // public $prod_descr;
    public $proof_path;
    public $bc_name;
    public $bc_title;
    public $bc_email;
    public $bc_phone;
    public $bc_fax;
    public $bc_cell;
    public $bc_address1;
    public $bc_address2;
    public $bc_city;
    public $bc_state;
    public $bc_zip;
    public $bc_name2;
    public $bc_title2;
    public $bc_email2;
    public $bc_phone2;
    public $bc_fax2;
    public $bc_cell2;
    public $bc_address1b;
    public $bc_address2b;
    public $bc_city2;
    public $bc_state2;
    public $bc_zip2;
    public $bc_disclaimer1;
    public $bc_disclaimer2;
    public $bc_specialInstructions;
    public $submitRush;
    public $date;

    public function mount()
    {
    }

    protected function rules()
    {
        return [
            'confirm' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function viewCart(Product $product)
    {
        Session::put('saveCart', false);
        Session::put('restoreCart', false);

        return view('cart.cart');
    }

    public function postDate()
    {
        Session::put('saveCart', false);

        return view('cart.cart');
    }

    public function submitRush(Request $request)
    {
        // $this->validate();

        $this->rush = true;

        return view('cart.cart', [$this->rush, true], [$this->date, session('date')]);
    }

    public function postConfirm()
    {
        return back();
    }

    public function UpdatedRowQty()
    {
    }

    public function storeCart()
    {
        // $product = Product::all();
        // $username = Auth::user()->username;

        // try {
        //     if (FacadesCart::content()->count() > 0) {
        //         FacadesCart::store($username);
        //     }
        //     return view('cart.cart', compact('product'));

        // } catch (\Exception $e) {
        //     session()->flash('message', 'You already have a saved cart!  Restore it before saving a new cart.');
        // }

        // return view('cart.cart', compact('product'));
    }

    public function destroyRow($rowId)
    {
        // dd($rowId);
        // \Cart::remove($rowId);
        // $userId = Auth::user()->id;
        // \Cart::session($userId)->remove($rowId);

        // if (Cart::content()->count() > 0) {
        // session()->flash('message', 'This item has been successfully removed from your cart.');
        // }
// dd($rowId);
        // $userId = auth()->user()->id; // or any string represents user identifier
        Cart::remove($rowId);

        return back();
    }

    public function emailRow($rowId)
    {
        $imgToEmail = Cart::get($rowId)->options->proof_path;
        $adminEmail = Auth::user()->email;
        $adminName = Auth::user()->contact_a;
        $prodName = Cart::get($rowId)->name;
        $bcName = Cart::get($rowId)->options->bc_name;

        Mail::to($adminEmail)->send(new PdfProof($imgToEmail, $prodName, $adminEmail, $adminName, $bcName));

        $msg = 'The ' . $prodName . ' proof  for ' . $bcName . ' ';
        // $msg .=  PHP_EOL;
        // $msg .= nl2br($msg);
        $msg .= 'has been emailed to the admin: ' . Auth::user()->contact_a . ' (' . Auth::user()->email . ')';
        $msg = nl2br($msg);

        Session::put('proofMsg', true);
        Session::put('msg', $msg);

        // return Redirect::to('cart')->with('msg', $msg);
        // return view('cart', ['msg' => $msg]);
        return back();
    }

    public function editRow($rowId, Product $product)
    {
        $row = Cart::get($rowId) !== null ? Cart::get($rowId) : Cart::get(session('rowId'));

        $prod_layout = $row->options->prod_layout;

        $prod_id = $row->id;

        switch ($prod_layout) {
            case 'SBC':
                $headerMessage = 'Staff Business Card';
                break;
            case 'ABC':
                $headerMessage = 'Associate Business Card';
                break;
            case 'PBC':
                $headerMessage = 'Partner Business Card';
                $prod_id = 103;
                break;
            case 'SBCFYI':
                $headerMessage = 'Staff Combo BC + FYI Pads';
                break;
            case 'ABCFYI':
                $headerMessage = 'Associate Combo BC + FYI Pads';
                break;
            case 'PBCFYI':
                $headerMessage = 'Partner Combo BC + FYI Pads';
                break;
            case 'SFYI':
                $headerMessage = 'Staff FYI Pads';
                break;
            case 'AFYI':
                $headerMessage = 'Associate FYI Pads';
                break;
            case 'PFYI':
                $headerMessage = 'Partner FYI Pads';
                break;
            case 'ADSBC':
                $headerMessage = 'Associate Double Sided BCs';
                break;
            case 'PDSBC':
                $headerMessage = 'Partner Double Sided BC';
                break;
            case 'NTAG':
                $headerMessage = 'Name Badge';
                break;
            default:
                $headerMessage = 'Your Product';
                break;
        }
// dd($prod_id);
        $titles = '';
        // if ($row->id == 101 || $row->id == 104 || $row->id == 107) {
        //     $titles = Title::where('type', 'Staff')->orderBy('title')->pluck('title', 'title');
        // }
        // if ($row->id == 102 || $row->id == 105 || $row->id == 108 || $row->id == 110) {
        //     $titles = Title::where('type', 'Associate')->orderBy('title')->pluck('title', 'title');
        // }

        if ($prod_id == 103 || $row->id == 106 || $row->id == 109 || $row->id == 111) {
            $titles = Title::where('type', 'Partner')->orderBy('title')->pluck('title', 'title');
        }

        Session::put('rowId', $rowId);
        Session::put('prod_name', $row->name);
        Session::put('prod_id', $prod_id);
        Session::put('prod_layout', $row->options->prod_layout);
        Session::put('prod_descr', $row->options->prod_descr);
        Session::put('proof_path', $row->options->proof_path);
        Session::put('bc_qty', $row->options->bc_qty);
        Session::put('bc_name', $row->options->bc_name);
        Session::put('bc_title', $row->options->bc_title);
        Session::put('bc_email', $row->options->bc_email);
        Session::put('bc_phone', $row->options->bc_phone);
        Session::put('bc_cell', $row->options->bc_cell);
        Session::put('bc_fax', $row->options->bc_fax);
        Session::put('bc_address1', $row->options->bc_address1);
        Session::put('bc_address2', $row->options->bc_address2);
        Session::put('bc_city', $row->options->bc_city);
        Session::put('bc_state', $row->options->bc_state);
        Session::put('bc_zip', $row->options->bc_zip);
        Session::put('bc_disclaimer1', $row->options->bc_disclaimer1);
        Session::put('bc_disclaimer2', $row->options->bc_disclaimer2);
        Session::put('bc_name2', $row->options->bc_name2);
        Session::put('bc_title2', $row->options->bc_title2);
        Session::put('bc_email2', $row->options->bc_email2);
        Session::put('bc_phone2', $row->options->bc_phone2);
        Session::put('bc_cell2', $row->options->bc_cell2);
        Session::put('bc_fax2', $row->options->bc_fax2);
        Session::put('bc_address1b', $row->options->bc_address1b);
        Session::put('bc_address2b', $row->options->bc_address2b);
        Session::put('bc_city2', $row->options->bc_city2);
        Session::put('bc_state2', $row->options->bc_state2);
        Session::put('bc_zip2', $row->options->bc_zip2);
        Session::put('bc_specialInstructions', $row->options->sp_instr);

        return view('/product/edit',  ['headerMessage' => $headerMessage, 'product' => $product, 'titles' => $titles]);
        // return action([BusinessCard::class, 'submitForm']);
    }

    public function restoreOrder(Product $product, Order $order)
    {
        Session::put('restoreOrder', true);

        $order = Order::where('confirmation', session('confirmation'))->first();
        $username = Auth::user()->username;
        // dd($order->confirmation);
        // dd($this->prod_name);
        $this->confirmation = $order->where('confirmation', session('confirmation'))->pluck('confirmation');
        $this->userId = $order->where('confirmation', session('confirmation'))->pluck('user_id');
        $this->id = $order->where('confirmation', session('confirmation'))->pluck('id');
        $this->name = $order->where('confirmation', session('confirmation'))->pluck('name');
        $this->contact_s = $order->where('confirmation', session('confirmation'))->pluck('contact_s');
        $this->address_s = $order->where('confirmation', session('confirmation'))->pluck('address_s');
        $this->cart = $order->where('confirmation', session('confirmation'))->pluck('cart');


        // $this->bc_specialInstructions = $this->order->where('confirmation', session('confirmation'))->pluck('order_array')[0][0]['sp_instr_o'];
        // $this->bc_specialInstructions = Arr::get($this->orderArray, '0.sp_instr_o');
        $orderArray = $order->order_array;
        $orderArray = unserialize($orderArray);
        // dd($orderArray);
        $count = count($orderArray) - 1;

        for ($i = 0; $i <= $count; $i++) {
            // dd(Arr::get($orderArray, $i . '.bcfyi_qty'));
            $row_id = Arr::get($orderArray, $i . '.row_id');
            // $prod_name = Arr::get($orderArray, $i . '.prod_name');
            Arr::get($orderArray, $i . '.prod_name') ? $prod_name = Arr::get($orderArray, $i . '.prod_name') : '';
            $order_type_o = Arr::get($orderArray, $i . '.order_type_o');
            $prod_layout = Arr::get($orderArray, $i . '.prod_layout');
            $prod_descr = Arr::get($orderArray, $i . '.prod_descr');
            Arr::get($orderArray, $i . '.bc_qty') ? $prod_name = Arr::get($orderArray, $i . '.bc_qty') : '';
            Arr::get($orderArray, $i . '.bcfyi_qty') ? $prod_name = Arr::get($orderArray, $i . '.bcfyi_qty') : '';
            $quantity = Arr::get($orderArray, $i . '.quantity');
            // dd(echo: $quantity);
            $proof_path = Arr::get($orderArray, $i . '.proof_path');
            $name_o = Arr::get($orderArray, $i . '.name_o');
            $email_o = Arr::get($orderArray, $i . '.email_o');
            $title_o = Arr::get($orderArray, $i . '.title_o');
            $phone_o = Arr::get($orderArray, $i . '.phone_o');
            $fax_o = Arr::get($orderArray, $i . '.fax_o');
            $cell_o = Arr::get($orderArray, $i . '.cell_o');
            $address1_o = Arr::get($orderArray, $i . '.address1_o');
            $address2_o = Arr::get($orderArray, $i . '.address2_o');
            $city_o = Arr::get($orderArray, $i . '.city_o');
            $state_o = Arr::get($orderArray, $i . '.state_o');
            $zip_o = Arr::get($orderArray, $i . '.zip_o');
            $disclaimer1_o = Arr::get($orderArray, $i . '.disclaimer1');
            $disclaimer2_o = Arr::get($orderArray, $i . '.disclaimer2');
            $name2 = Arr::get($orderArray, $i . '.name2');
            $email2 = Arr::get($orderArray, $i . '.email2');
            $title2 = Arr::get($orderArray, $i . '.title2');
            $phone2 = Arr::get($orderArray, $i . '.phone2');
            $fax2 = Arr::get($orderArray, $i . '.fax2');
            $cell2 = Arr::get($orderArray, $i . '.cell2');
            $address1b = Arr::get($orderArray, $i . '.address1b');
            $address2b = Arr::get($orderArray, $i . '.address2b');
            $city2 = Arr::get($orderArray, $i . '.city2');
            $state2 = Arr::get($orderArray, $i . '.state2');
            $zip2 = Arr::get($orderArray, $i . '.zip2');
            $sp_instr_o = Arr::get($orderArray, $i . '.sp_instr_o');
            // dd($name2);
            if ($prod_layout == 'NTAG' || session('prod_layout') === 'NTAG') {
                switch ($quantity) {
                    case '1':
                        $quantity = 1;
                        $bcfyi_qty = $quantity . ' Name Badge';
                        break;
                    case '2':
                        $quantity = 2;
                        $bcfyi_qty = $quantity . ' Name Badges';
                        break;
                    case '3':
                        $quantity = 3;
                        $bcfyi_qty = $quantity . ' Name Badges';
                        break;
                    default:
                        $quantity = 1;
                        $bcfyi_qty = $quantity . ' Name Badge';
                }
            }

            if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC' || $prod_layout == 'ADSBC' || $prod_layout == 'PDSBC' || session('prod_layout') === 'SBC' || session('prod_layout') === 'ABC' || session('prod_layout') === 'PBC' || session('prod_layout') === 'ADSBC' || session('prod_layout') === 'PDSBC') {
                switch ($quantity) {
                    case '250':
                        $quantity = 250;
                        $bcfyi_qty = $quantity . ' Business Cards';
                        break;
                    case '500':
                        $quantity = 500;
                        $bcfyi_qty = $quantity . ' Business Cards';
                        break;
                    default:
                        $quantity = 250;
                        $bcfyi_qty = $quantity . ' Business Cards';
                }
            }

            if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI' || session('prod_layout') === 'SFYI' || session('prod_layout') === 'AFYI' || session('prod_layout') === 'PFYI') {
                switch ($quantity) {
                    case '4':
                        $quantity = 4;
                        $bcfyi_qty = $quantity . ' FYI Pads';
                        break;
                    case '8':
                        $quantity = 8;
                        $bcfyi_qty = $quantity . ' FYI Pads';
                        break;
                    default:
                        $quantity = 4;
                        $bcfyi_qty = $quantity . ' FYI Pads';
                }
            }

            if ($prod_layout == 'SBCFYI' || $prod_layout == 'ABCFYI' || $prod_layout == 'PBCFYI' || session('prod_layout') === 'SBCFYI' || session('prod_layout') === 'ABCFYI' || session('prod_layout') === 'PBCFYI') {
                switch ($quantity) {
                    case '24':
                        $quantity = 24;
                        $bcfyi_qty = '250 BCs + 4 FYI Pads';
                        break;
                    case '28':
                        $quantity = 28;
                        $bcfyi_qty = '250 BCs + 8 FYI Pads';
                        break;
                    case '54':
                        $quantity = 54;
                        $bcfyi_qty = '500 BCs + 4 FYI Pads';
                        break;
                    case '58':
                        $quantity = 58;
                        $bcfyi_qty = '500 BCs + 8 FYI Pads';
                        break;
                    default:
                        $quantity = 24;
                        $bcfyi_qty = '250 BCs + 4 FYI Pads';
                }
            }

            $cartItem = Cart::add($row_id, $order_type_o, $quantity, '0', [
                'prod_layout' => $prod_layout,
                'prod_descr' => $prod_descr,
                'proof_path' => $proof_path,
                'bc_qty' => $bcfyi_qty,
                'bc_name' => $name_o,
                'bc_title' => $title_o,
                'bc_email' => $email_o,
                'bc_phone' => $phone_o,
                'bc_fax' => $fax_o,
                'bc_cell' => $cell_o,
                'bc_address1' => $address1_o,
                'bc_address2' => $address2_o,
                'bc_city' => $city_o,
                'bc_state' => $state_o,
                'bc_zip' => $zip_o,
                'bc_disclaimer1' => $bc_disclaimer1_o,
                'bc_disclaimer2' => $bc_disclaimer2_o,
                'bc_name2' => $name2,
                'bc_title2' => $title2,
                'bc_email2' => $email2,
                'bc_phone2' => $phone2,
                'bc_fax2' => $fax2,
                'bc_cell2' => $cell2,
                'bc_address1b' => $address1b,
                'bc_address2b' => $address2b,
                'bc_city2' => $city2,
                'bc_state2' => $state2,
                'bc_zip2' => $zip2,
                // 'bc_specialInstructions' => $specialInstructions,
            ]);
        }
        // dd(Cart::content());
        $restoreMsg = 'The order has been successfully restored to your cart';

        return redirect()->action([CartView::class, 'viewCart'], compact('product', 'username'))->with('message', $restoreMsg);
    }

    public function render()
    {
        return view('livewire.cart-view');
    }
}
