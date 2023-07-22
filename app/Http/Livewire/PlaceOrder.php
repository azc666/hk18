<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Mail\OrderMailConf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ProductionMailConf;
// use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
// use Darryldecode\Cart\Facades\CartFacade as CartFacade;

class PlaceOrder extends Component
{
    public $confirm;
    public $confirmation;
    public $cart;
    public $orderArray;
    public $orderArrayCount;
    public $savedCart;
    public $dt_o;
    public $order_array_count;
    public $order_array;
    public $bc_name2;
    public $cartCollection;
    public $title_o;
    public $bc_title;
    public $bc_title2;
    public $item;

    public function mount()
    {
    }

    protected function rules()
    {
        return [
            'confirmed' => 'required',
            'confirmedRestore' => 'required'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function placeOrder(Request $request, \Gloudemans\Shoppingcart\Facades\Cart $cart, Product $product)
    {
        Session::put('saveCart', false);

        if (session('confirmation')) {
            $order = Order::where('confirmation', session('confirmation'))->first();
            $updated = $order->updated_at;
            $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $updated)->format('Y-m-d');
        }
// dd(!session('restored'));
        if (session('restored') && $date < "2023-06-14" && $request->has('confirmRestore') && $request->has('confirm')) {
            $checked = "restored & old date & all checked";
            // dd($checked);
        } elseif (session('restored') && $date > "2023-06-14" && $request->has('confirm')) {
            $checked = "restored & new date & confirm checked";
            // dd($checked);
        } elseif (!session('restored') && $request->has('confirm')) {
            $checked = "not restored & confim checked";
            // dd(!session('restored'));
        } else {
            $checked = "not checked";
            // dd($checked);
        }

        if ( $checked !== "not checked") {
            $dt = Carbon::now();
            $dt = substr($dt->year, -2) . $dt->month . $dt->day . '-' . $dt->hour . $dt->minute .  $dt->second;

            $confirmation = $this->confirmation;
            $confirmation = Auth::user()->loc_num . '-' . $dt;

            $cart = $this->cart;
            $cart = \Gloudemans\Shoppingcart\Facades\Cart::content();

            $orderArray = $this->orderArray;
            $orderArrayCount = $this->orderArrayCount;
            $orderArrayCount = Cart::content()->count() - 1;

            foreach (Cart::content() as $item) {
                if (session('bc_title') == 'Staff Attorney (Title will be updated to "Attorney")') {
                    $this->bc_title = 'Attorney';
                    $bc_title = $this->bc_title;
                } else {
                    $bc_title = $item->options->bc_title;
                }
                if (session('bc_title2') == 'Staff Attorney (Title will be updated to "Attorney")') {
                    $this->bc_title2 = 'Attorney';
                    $bc_title2 = $this->bc_title2;
                } else {
                    $bc_title2 = $item->options->bc_title2;
                }

                $orderArray[] = [
                    'prod_name'    =>  $item->name,
                    'row_id'       =>  $item->rowId,
                    'prod_id'      =>  $item->id,
                    'quantity'     =>  $item->qty,
                    'order_type_o' =>  strip_tags($item->name),
                    'prod_layout'  =>  $item->options->prod_layout,
                    'prod_descr'   =>  $item->options->prod_descr,
                    'bc_qty'       =>  $item->options->bc_qty,
                    'proof_path'   =>  $item->options->proof_path,
                    'name_o'       =>  $item->options->bc_name,
                    'title_o'      =>  $bc_title,
                    'email_o'      =>  $item->options->bc_email,
                    'phone_o'      =>  strip_tags($item->options->bc_phone),
                    'fax_o'        =>  $item->options->bc_fax,
                    'cell_o'       =>  $item->options->bc_cell,
                    'address1_o'   =>  $item->options->bc_address1,
                    'address2_o'   =>  $item->options->bc_address2,
                    'city_o'       =>  $item->options->bc_city,
                    'state_o'      =>  $item->options->bc_state,
                    'zip_o'        =>  $item->options->bc_zip,
                    'disclaimer1_o'=>  $item->options->bc_disclaimer1,
                    'disclaimer2_o'=>  $item->options->bc_disclaimer2,
                    'name2'        =>  $item->options->bc_name2,
                    'title2'       =>  $bc_title2,
                    'email2'       =>  $item->options->bc_email2,
                    'phone2'       =>  strip_tags($item->options->bc_phone2),
                    'fax2'         =>  $item->options->bc_fax2,
                    'cell2'        =>  $item->options->bc_cell2,
                    'address1b'    =>  $item->options->bc_address1b,
                    'address2b'    =>  $item->options->bc_address2b,
                    'city2'        =>  $item->options->bc_city2,
                    'state2'       =>  $item->options->bc_state2,
                    'zip2'         =>  $item->options->bc_zip2,
                    'sp_instr_o'   =>  $item->options->sp_instr,
                ];
            }

            $order = new Order;

            $html = view('cart.cart-table')->render();

            $order->order_array = serialize($orderArray);

            $order->user_id = auth()->id();
            $order->name = Auth::user()->loc_name;
            $order->contact_s = Auth::user()->contact_s;
            // $order->address_s = Auth::user()->address1_s;
            $address_s = Auth::user()->address1_s . '<br>';
            $address_s .= Auth::user()->address2_s ? Auth::user()->address2_s . '<br>' : '';
            $address_s .= Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s;
            $address_s = new HtmlString($address_s);
            $order->address_s = $address_s;

            $order->confirmation = $confirmation;
            $order->subtotal = "";
            $order->cart = "$html";
            $order->rush = session('rushOrder');
            $order->save();

            $savedCart = $this->savedCart;
            $savedCart = Order::where('confirmation', $confirmation)->first()->cart;

            $dt_o = $this->dt_o;
            $orderDate = Order::where('confirmation', $confirmation)->first()->created_at;
            $dt_o = (new Carbon($orderDate))->format('m/d/Y');

            $adminEmail = Auth::user()->email;
            // dd(Auth::user()->email);
            $adminName = Auth::user()->contact_a;

            if (Cart::content()->count() > 0) {
                $order_array = $order->order_array;
                $order_array = unserialize($order_array);
                $order_array_count = count($order_array) - 1;
            } else {
                return Redirect::to('categories')->with('message', 'You have already placed your order!');
            }

            $rush = $order->rush;
            $rush = Session::put('rush', $order->rush);

            $i = $orderArrayCount;
            $ntagEmail = false;
            $dsbcEmail = false;
            $loc_num = Auth::user()->loc_num;

            for ($i=0; $i <= $orderArrayCount ; $i++) {
                if ($orderArray[$i]['prod_layout'] === 'NTAG') {
                    $ntagEmail = true;
                }
                if ($orderArray[$i]['prod_layout'] === 'ADSBC' || $orderArray[$i]['prod_layout'] === 'PDSBC') {
                    $dsbcEmail = true;
                }
            }

            // dd($loc_num);

            if ($ntagEmail) {
                Mail::to("sheri.testa@hklaw.com")->send(new OrderMailConf($confirmation, $savedCart, $dt_o, $rush, $adminEmail, $adminName, $orderArray, $order));
                Mail::to("bonnie.kelly@hklaw.com")->send(new OrderMailConf($confirmation, $savedCart, $dt_o, $rush, $adminEmail, $adminName, $orderArray, $order));

                Mail::to("sarah.caramanica@hklaw.com")->send(new OrderMailConf($confirmation, $savedCart, $dt_o, $rush, $adminEmail, $adminName, $orderArray, $order));
            }

            if ($dsbcEmail) {
                Mail::to("sheri.testa@hklaw.com")->send(new OrderMailConf($confirmation, $savedCart, $dt_o, $rush, $adminEmail, $adminName, $orderArray, $order));
                Mail::to("nicklas.ford@hklaw.com")->send(new OrderMailConf($confirmation, $savedCart, $dt_o, $rush, $adminEmail, $adminName, $orderArray, $order));
            }

            if ($loc_num === "35" || $loc_num === "46" || $loc_num === "34" || $loc_num === "72" || $loc_num === "41" || $loc_num === "42" || $loc_num === "49" ) {
                Mail::to("sheri.testa@hklaw.com")->send(new OrderMailConf($confirmation, $savedCart, $dt_o, $rush, $adminEmail, $adminName, $orderArray, $order));
            }

            if (session('authorized')) {
                Mail::to("sheri.testa@hklaw.com")->send(new OrderMailConf($confirmation, $savedCart, $dt_o, $rush, $adminEmail, $adminName, $orderArray, $order));
            } else {
                Mail::to($adminEmail)->send(new OrderMailConf($confirmation, $savedCart, $dt_o, $rush, $adminEmail, $adminName, $orderArray, $order));
            }

            // Mail::to('allen@g-d.com')->send(new ProductionMailConf($confirmation, $savedCart, $dt_o, $order_array, $order_array_count, $address_s, $adminEmail, $adminName, $rush));
            Mail::to('output@g-d.com')->send(new ProductionMailConf($confirmation, $savedCart, $dt_o, $order_array, $order_array_count, $address_s, $adminEmail, $adminName, $rush));

            // $username = Auth::user()->username;
            // \Darryldecode\Cart\Facades\CartFacade::destroy($username);

            $request->session()->forget('restored');
            // unset($_SESSION['restored']);
            // Session::put(false, session('restored'));
            // dd(session('restored'));

            $username = Auth::user()->username;
            Cart::destroy($username);


            return view('cart.place-order', compact('confirmation', 'cart', 'dt_o', 'order_array', 'address_s', 'rush'), ['orderArray' => $orderArray, 'orderArrayCount' => $orderArrayCount, 'savedCart' => $savedCart, 'order' => $order, 'dt_o' => $dt_o, 'rush' => $rush]);
        } else {

            $notConfirmed = 'notConfirmed';
            Session::put('notConfirmed', $notConfirmed);
// dd(session('restored'));
            if (session('restored')) {
                $notConfirmedRestore = 'notConfirmedRestore';
                Session::put('notConfirmedRestore', $notConfirmedRestore);
            }


            return view('cart.cart');
        }
    }

    public function render()
    {
        return view('livewire.place-order');
    }

    /**
     * Get the value of confirmation
     */
    // public function getConfirmation()
    // {
    //     return $this->confirmation;
    // }
}
