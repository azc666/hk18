<?php

namespace App\Http\Livewire;

use App\Rules\Esq;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Title;
use App\Classes\Phone;
use App\Models\Product;
use Livewire\Component;
use GuzzleHttp\Middleware;
use Darryldecode\Cart\Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Livewire\CartView;
use \Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Propaganistas\LaravelPhone\PhoneNumber;
use EricMakesStuff\DisplayName\Facades\DisplayName;

class BusinessCard extends Component
{
    public $bc_qty;
    public $bc_name;
    public $bc_title;
    public $bc_email;
    public $bc_phone;
    public $bc_cell;
    public $bc_fax;
    public $bc_address1;
    public $bc_address2;
    public $bc_city;
    public $bc_state;
    public $bc_zip;
    public $titles;
    public $title;
    public $sp_instr;
    public $bc_specialInstructions;
    public $selectedType;
    public $product;
    public $im;
    public $cartItem;
    public $quantity;
    public $rowId;
    public $count;
    public $bcfyi_qty;
    public $bc_name2;
    public $bc_title2;
    public $bc_email2;
    public $bc_phone2;
    public $bc_cell2;
    public $bc_fax2;
    public $bc_address1b;
    public $bc_address2b;
    public $bc_city2;
    public $bc_state2;
    public $bc_zip2;
    public $request;

    protected function rules()
    {
        if (Auth::user()->username == 'HK46' && session('prod_id') === 110)
            return [
                'bc_title' => 'required',
                'bc_title2' => 'required',
            ];

        if (Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41')
            return [
                'bc_email' => 'required|regex:/^[a-z0-9@,-\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_phone' => 'required|regex:/([0-9\s\-\+\(\)]*)$/|min:12',
                'bc_cell' => 'nullable|regex:/([0-9\s\-\+\(\)]*)$/|min:12',
                'bc_fax' => 'nullable|regex:/([0-9\s\-\+\(\)]*)$/|min:12',
                'bc_phone2' => 'exclude_unless:bc_name2,true|required|regex:/([0-9\s\-\+\(\)]*)$/|min:12',
                'bc_cell2' => 'exclude_unless:bc_name2,true|nullable|regex:/([0-9\s\-\+\(\)]*)$/|min:12',
                'bc_fax2' => 'exclude_unless:bc_name2,true|nullable|regex:/([0-9\s\-\+\(\)]*)$/|min:12',
            ];

        if (Auth::user()->username == 'HK34' && (session('prod_id') === 110 || session('prod_id') === 111))
            return [
                'bc_qty' => 'required',
                'bc_name' => ['required', 'min:3', new Esq],
                'bc_title' => 'required',
                'bc_email' => 'required|regex:/^[a-z0-9@,-\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_phone' => 'required|phone:CO|min:12',
                'bc_cell' => 'nullable|phone:CO|min:12',
                'bc_fax' => 'nullable|phone:CO|min:12',
                'bc_phone2' => 'required|phone:CO|min:12',
                'bc_cell2' => 'nullable|phone:CO|min:12',
                'bc_fax2' => 'nullable|phone:CO|min:12',
                'bc_address1' => 'required|min:3|max:50',
                'bc_address2' => 'nullable|min:3|max:50',
                'bc_city' => 'min:3|max:50',
                'bc_state' => 'required|min:2|max:50',
                'bc_zip' => 'required|min:5|max:10',
                'bc_name2' => ['required', 'min:3', new Esq],
                'bc_title2' => 'required',
                'bc_email2' => 'required|regex:/^[a-z0-9@\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_address1b' => 'required|min:3|max:50',
                'bc_address2b' => 'nullable|min:3|max:50',
                'bc_city2' => 'required|min:3|max:50',
                'bc_state2' => 'required|min:2|max:50',
                'bc_zip2' => 'required|min:5|max:10',
                'bc_specialInstructions' => 'max:255',
            ];

        if (Auth::user()->username === 'HK34' && (session('prod_id') === 101 || session('prod_id') === 102 || session('prod_id') === 103 || session('prod_id') === 104 ||session('prod_id') === 105 || session('prod_id') === 106))
            return [
                'bc_qty' => 'required',
                'bc_name' => ['required', 'min:3', new Esq],
                'bc_title' => 'required',
                'bc_email' => 'required|regex:/^[a-z0-9@,-\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_phone' => 'required|phone:CO|min:12',
                'bc_cell' => 'nullable|phone:CO|min:12',
                'bc_fax' => 'nullable|phone:CO|min:12',
                'bc_address1' => 'required|min:3|max:50',
                'bc_address2' => 'nullable|min:3|max:50',
                'bc_city' => 'min:3|max:50',
                'bc_state' => 'required|min:2|max:50',
                'bc_zip' => 'required|min:5|max:10',
                'bc_specialInstructions' => 'max:255',
        ];

        if (Auth::user()->username === 'HK34' && (session('prod_id') === 107 || session('prod_id') === 108 || session('prod_id') === 109))
            return [
                'bc_qty' => 'required',
                'bc_name' => ['required', 'min:3', new Esq],
                'bc_email' => 'required|regex:/^[a-z0-9@,-\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_phone' => 'required|phone:CO|min:12',
                'bc_cell' => 'nullable|phone:CO|min:12',
                'bc_fax' => 'nullable|phone:CO|min:12',
                'bc_address1' => 'required|min:3|max:50',
                'bc_address2' => 'nullable|min:3|max:50',
                'bc_city' => 'min:3|max:50',
                'bc_state' => 'required|min:2|max:50',
                'bc_zip' => 'required|min:5|max:10',
                'bc_specialInstructions' => 'max:255',
            ];

        if (session('prod_id') === 101 || session('prod_id') === 102 || session('prod_id') === 104 || session('prod_id') === 105)
            return [
                'bc_qty' => 'required',
                'bc_name' => ['required', 'min:3', new Esq],
                'bc_title' => 'required',
                'bc_email' => 'required|regex:/^[a-z0-9@,-\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_phone' => 'required|phone:CO,MX,US',
                'bc_cell' => 'nullable|phone:CO,MX,US',
                'bc_fax' => 'nullable|phone:CO,MX,US',
                'bc_address1' => 'required|min:3|max:50',
                'bc_address2' => 'nullable|min:3|max:50',
                'bc_city' => 'min:3|max:50',
                'bc_state' => 'required|min:2|max:50',
                'bc_zip' => 'required|min:3|max:10',
                'bc_specialInstructions' => 'max:255',
            ];

        if (session('prod_id') === 103 || session('prod_id') === 106)
            return [
                'bc_qty' => 'required',
                'bc_name' => ['required', 'min:3', new Esq],
                'bc_title' => '',
                'bc_email' => 'required|regex:/^[a-z0-9@,-\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_phone' => 'required|phone:CO,MX,US',
                'bc_cell' => 'nullable|phone:CO,MX,US',
                'bc_fax' => 'nullable|phone:CO,MX,US',
                'bc_address1' => 'required|min:3|max:50',
                'bc_address2' => 'nullable|min:3|max:50',
                'bc_city' => 'required|min:3|max:50',
                'bc_state' => 'required|min:2|max:50',
                'bc_zip' => 'required|min:5|max:10',
                'bc_specialInstructions' => 'max:255',
            ];

        if (session('prod_id') === 110)
            return [
                'bc_qty' => 'required',
                'bc_name' => ['required', 'min:3', new Esq],
                'bc_title' => 'required',
                'bc_email' => 'required|regex:/^[a-z0-9@,-\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_phone' => 'required|phone:CO,MX,US',
                'bc_cell' => 'nullable|phone:CO,MX,US',
                'bc_fax' => 'nullable|phone:CO,MX,US',
                'bc_phone2' => 'required|phone:CO,MX,US',
                'bc_cell2' => 'exclude_unless:bc_name2,true|nullable|phone:CO,MX,US',
                'bc_fax2' => 'exclude_unless:bc_name2,true|nullable|phone:CO,MX,US',
                'bc_address1' => 'required|min:3|max:50',
                'bc_address2' => 'nullable|min:3|max:50',
                'bc_city' => 'min:3|max:50',
                'bc_state' => 'required|min:2|max:50',
                'bc_zip' => 'required|min:5|max:10',
                'bc_name2' => ['required', 'min:3', new Esq],
                'bc_title2' => 'required',
                'bc_email2' => 'required|regex:/^[a-z0-9@,-\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_address1b' => 'required|min:3|max:50',
                'bc_address2b' => 'nullable|min:3|max:50',
                'bc_city2' => 'required|min:3|max:50',
                'bc_state2' => 'required|min:2|max:50',
                'bc_zip2' => 'required|min:5|max:10',
                'bc_specialInstructions' => 'max:255',
            ];

        if (session('prod_id') === 111)
            return [
                'bc_qty' => 'required',
                'bc_name' => ['required', 'min:3', new Esq],
                'bc_title' => '',
                'bc_email' => 'required|regex:/^[a-z0-9@,-\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_phone' => 'required|phone:CO,MX,US',
                'bc_cell' => 'nullable|phone:CO,MX,US',
                'bc_fax' => 'nullable|phone:CO,MX,US',
                'bc_phone2' => 'required|phone:CO,MX,US',
                'bc_cell2' => 'exclude_unless:bc_name2,true|nullable|phone:CO,MX,US',
                'bc_fax2' => 'exclude_unless:bc_name2,true|nullable|phone:CO,MX,US',
                'bc_address1' => 'required|min:3|max:50',
                'bc_address2' => 'nullable|min:3|max:50',
                'bc_city' => 'required|min:3|max:50',
                'bc_state' => 'required|min:2|max:50',
                'bc_zip' => 'required|min:5|max:10',
                'bc_name2' => ['required', 'min:3', new Esq],
                'bc_title2' => '',
                'bc_email2' => 'required|regex:/^[a-z0-9@,-\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_address1b' => 'required|min:3|max:50',
                'bc_address2b' => 'nullable|min:3|max:50',
                'bc_city2' => 'required|min:3|max:50',
                'bc_state2' => 'required|min:2|max:50',
                'bc_zip2' => 'required|min:5|max:10',
                'bc_specialInstructions' => 'max:255',
            ];

        if (session('prod_id') === 107 || session('prod_id') === 108 || session('prod_id') === 109)
            return [
                'bc_qty' => 'required',
                'bc_name' => ['required', 'min:3', new Esq],
                'bc_email' => 'required|regex:/^[a-z0-9@,-\.]+$/|ends_with:"@hklaw.com"|email',
                'bc_phone' => 'required|phone:CO,MX,US',
                'bc_cell' => 'nullable|phone:CO,MX,US',
                'bc_fax' => 'nullable|phone:CO,MX,US',
                'bc_address1' => 'required|min:3|max:50',
                'bc_address2' => 'nullable|min:3|max:50',
                'bc_city' => 'min:3|max:50',
                'bc_state' => 'min:2|max:50',
                'bc_zip' => 'min:5|max:10',
                'bc_specialInstructions' => 'max:255',
            ];

        if (session('prod_id') === 112)
            return [
                'bc_qty' => 'required',
                'bc_name' => 'required|min:3|max:30',
                'bc_specialInstructions' => 'max:255',
            ];

    }

    protected $messages = [
        'bc_phone.min' => 'The phone number must be at least 12 digits.',
        'bc_cell.min' => 'The mobile number must be at least 12 digits.',
        'bc_fax.min' => 'The fax number must be at least 12 digits.',
        'bc_phone.starts_with' => 'The phone number must begin with the correct country code and have the correct # of digits for your locality.',
        'bc_cell.starts_with' => 'The mobile number must begin with the correct country code and have the correct # of digits for your locality.',
        'bc_fax.starts_with' => 'The fax number must begin with the correct country code and have the correct # of digits for your locality.',
        'bc_phone2.min' => 'The phone number must be at least 12 digits.',
        'bc_cell2.min' => 'The mobile number must be at least 12 digits.',
        'bc_fax2.min' => 'The fax number must be at least 12 digits.',
        'bc_phone.required' => 'The phone number field is required',
        'bc_phone.phone' => 'Enter the phone number properly formatted with the correct # of digits for your locality.',
        'bc_cell.phone' => 'Enter the mobile number properly formatted with the correct # of digits for your locality.',
        'bc_fax.phone' => 'Enter the fax number properly formatted with the correct # of digits for your locality.',
        'bc_email.ends_with' => 'The email must end in "hklaw.com"',
        'bc_email_2.ends_with' => 'The email must end in "hklaw.com"',
        'bc_phone2.required' => 'The phone number field is required',
        'bc_phone2.phone' => 'Enter the phone number properly formatted with the correct # of digits for your locality.',
        'bc_cell2.phone' => 'Enter the mobile number properly formatted with the correct # of digits for your locality.',
        'bc_fax2.phone' => 'Enter the fax number properly formatted with the correct # of digits for your locality.',
        'bc_email.regex' => 'The email must contain lowercase characters or numbers only',
        'bc_email_2.regex' => 'The email must contain lowercase characters or numbers only',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Product $product)
    {
        $this->prod_id = $product->id;
        Session::put('prod_id', $this->prod_id);

        if (session('prod_id') === 101 || session('prod_id') === 104 || session('prod_id') === 107) {
            $this->titles = Title::where('type', 'Staff')->orderBy('title')->pluck('title', 'title');
        }
        if (session('prod_id') === 102 || session('prod_id') === 105 || session('prod_id') === 108 || session('prod_id') === 110) {
            $this->titles = Title::where('type', 'Associate')->orderBy('title')->pluck('title', 'title');
        }
        if (session('prod_id') === 103 || session('prod_id') === 106 || session('prod_id') === 109 || session('prod_id') === 111) {
            $this->titles = Title::where('type', 'Partner')->orderBy('title')->pluck('title', 'title');
        }

        $this->bc_address1 = Auth::user()->loc_address1;
        $this->bc_address2 = Auth::user()->loc_address2;
        $this->bc_city = Auth::user()->loc_city;
        $this->bc_state = Auth::user()->loc_state;
        $this->bc_zip = Auth::user()->loc_zip;

        $HKName = '';
        if (Auth::user()->username === 'HK35' || Auth::user()->loc_num == 42) {
            $HKName = 'Holland & Knight México, SC';
        } elseif (Auth::user()->loc_num == 34) {
            $HKName = 'Holland & Knight Colombia SAS';
        } elseif (Auth::user()->loc_num == 46 || Auth::user()->loc_num == 41) {
            $HKName = 'Holland & Knight (UK) LLP';
        } else {
            $HKName = 'Holland & Knight LLP';
        }
        Session::put('HKName', $HKName);
    }

    public function updatedBcTitle()
    {
    }

    public function updatedBcQty()
    {
    }

    public function updatedBcEmail()
    {
    }

    public function updatedBcPhone()
    {
        $numb =  $this->bc_phone;
        $this->bc_phone = (new Phone)->phoneNumber($numb);
    }

    public function updatedBcPhone2()
    {
        $numb_2 =  $this->bc_phone2;
        $this->bc_phone2 = (new Phone)->phoneNumber_2($numb_2);
    }

    public function updatedBcCell()
    {
        $numbcell = $this->bc_cell;
        $this->bc_cell = (new Phone)->cellNumber($numbcell);
    }

    public function updatedBcCell2()
    {
        $numbcell_2 = $this->bc_cell2;
        $this->bc_cell2 = (new Phone)->cellNumber_2($numbcell_2);
    }

    public function updatedBcFax()
    {
        $numbfax = $this->bc_fax;
        $this->bc_fax = (new Phone)->faxNumber($numbfax);
    }

    public function updatedBcFax2()
    {
        $numbfax_2 = $this->bc_fax2;
        $this->bc_fax2 = (new Phone)->faxNumber_2($numbfax_2);
    }

    public function updatedBcSpecialInstructions()
    {
    }

    public function submitForm(Request $request, User $user, Product $product)
    {
        $this->validate();

        $request->bc_qty = $this->bc_qty;
        $request->bc_name = $this->bc_name;
        $request->bc_title = $this->bc_title;
        $request->bc_email = $this->bc_email;
        $request->bc_phone = $this->bc_phone;
        $request->bc_cell = $this->bc_cell;
        $request->bc_fax = $this->bc_fax;
        $request->bc_address1 = $this->bc_address1;
        $request->bc_address2 = $this->bc_address2;
        $request->bc_city = $this->bc_city;
        $request->bc_state = $this->bc_state;
        $request->bc_zip = $this->bc_zip;
        $request->bc_name2 = $this->bc_name2;
        $request->bc_title2 = $this->bc_title2;
        $request->bc_email2 = $this->bc_email2;
        // $request->bc_phone2 = $this->bc_phone2;
        $request->bc_phone2 = $this->bc_phone2 ? $this->bc_phone2 : '';
        $request->bc_cell2 = $this->bc_cell2;
        $request->bc_fax2 = $this->bc_fax2;
        $request->bc_address1b = $this->bc_address1b;
        $request->bc_address2b = $this->bc_address2b;
        $request->bc_city2 = $this->bc_city2;
        $request->bc_state2 = $this->bc_state2;
        $request->bc_zip2 = $this->bc_zip2;
        $request->bc_specialInstructions = $this->bc_specialInstructions;
        $count = $this->count;
        Session::put('bc_qty', $request->bc_qty);
        Session::put('bc_name', $request->bc_name);
        Session::put('bc_title', $request->bc_title);
        Session::put('bc_email', $request->bc_email);
        Session::put('bc_phone', $request->bc_phone);
        Session::put('bc_cell', $request->bc_cell);
        Session::put('bc_fax', $request->bc_fax);
        Session::put('bc_address1', $request->bc_address1);
        Session::put('bc_address2', $request->bc_address2);
        Session::put('bc_city', $request->bc_city);
        Session::put('bc_state', $request->bc_state);
        Session::put('bc_zip', $request->bc_zip);
        Session::put('bc_name2', $request->bc_name2);
        Session::put('bc_title2', $request->bc_title2);
        Session::put('bc_email2', $request->bc_email2);
        Session::put('bc_phone2', $request->bc_phone2);
        Session::put('bc_cell2', $request->bc_cell2);
        Session::put('bc_fax2', $request->bc_fax2);
        Session::put('bc_address1b', $request->bc_address1b);
        Session::put('bc_address2b', $request->bc_address2b);
        Session::put('bc_city2', $request->bc_city2);
        Session::put('bc_state2', $request->bc_state2);
        Session::put('bc_zip2', $request->bc_zip2);
        Session::put('bc_specialInstructions', $request->bc_specialInstructions);
        $username = auth()->user()->username;
        Session::put('username', $username);

        $product = $this->product;
        $product = Product::find($product->id);
        $prod_layout = Product::where('id', $product->id)->pluck('prod_layout')[0];
        $prod_name = $product->prod_name;
        Session::put('prod_name', $prod_name);
        $prod_descr = Product::where('id', $product->id)->pluck('description')[0];
        Session::put('prod_descr', nl2br($prod_descr));

        $data = [
            'product' => $product,
        ];
        $username = Auth::user()->username;
        $dn = DisplayName::initials(Session::get('bc_name'));
        Session::put('dn', $dn);

        view()->share('product', $data);

        if ($product->id === 101 || $product->id === 102 || $product->id === 103) {
            $pdf = '';
            // $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('pdf-view', $data)->setPaper([0, 0, 1220, 770]);
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('pdf-view', $data)->setPaper([0, 0, 2000, 2585]);

        }

        if ($product->id === 104 || $product->id === 105 || $product->id === 106) {
            $pdf = '';
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('pdf-view', $data)->setPaper([0, 0, 2000, 2585]);
        }

        if ($product->id === 107 || $product->id === 108 || $product->id === 109) {
            $pdf = '';
            Session::put('prod_layout', '');
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('pdf-view', $data)->setPaper([0, 0, 2000, 2585]);
        }

        if ($product->id === 110 || $product->id === 111) {
            $pdf = '';
            Session::put('prod_layout', '');
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('pdf-view', $data)->setPaper([0, 0, 2000, 2585]);
        }

        if ($product->id === 112) {

            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('pdf-view', $data)->setPaper([0, 0, 425, 750], 'landscape');
            // $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('pdf-view', $data);

        }

        $path = 'assets/proofs/' . $username  . '/' . $prod_layout . '-' . $dn . '-' . Carbon::now('America/New_York')->format('m-d-y-gis') . '-proof.pdf';

        $pdf->save($path);

        $im = new \Spatie\PdfToImage\Pdf($path);
        $pathToJpgProof = substr($path, 0, -3) . 'jpg';
        $im->saveImage($pathToJpgProof);
        $pathToCartProof = $pathToJpgProof;

        Session::put('pathToCartProof', $pathToCartProof);
        Session::put('pathToJpgProof', $pathToJpgProof);

        // // // // // Set the qty with description // // // // //

        if ($prod_layout == 'NTAG') {
            switch ($request->bc_qty) {
                case '1':
                    $this->quantity = 1;
                    $this->bcfyi_qty = $this->quantity . ' NameBadge';
                    break;
                case '2':
                    $this->quantity = 2;
                    $this->bcfyi_qty = $this->quantity . ' NameBadges';
                    break;
                case '3':
                    $this->quantity = 3;
                    $this->bcfyi_qty = $this->quantity . ' NameBadges';
                    break;
                default:
                    $this->quantity = 1;
                    $this->bcfyi_qty = $this->quantity . ' NameBadge';
            }
        }

        if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC' || $prod_layout == 'ADSBC' || $prod_layout == 'PDSBC') {
            switch ($request->bc_qty) {
                case '250':
                    $this->quantity = 250;
                    $this->bcfyi_qty = $this->quantity . ' Business Cards';
                    break;
                case '500':
                    $this->quantity = 500;
                    $this->bcfyi_qty = $this->quantity . ' Business Cards';
                    break;
                default:
                    $this->quantity = 250;
                    $this->bcfyi_qty = $this->quantity . ' Business Cards';
            }
        }

        if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI') {
            switch ($request->bc_qty) {
                case '4':
                    $this->quantity = 4;
                    $this->bcfyi_qty = $this->quantity . ' FYI Pads';
                    break;
                case '8':
                    $this->quantity = 8;
                    $this->bcfyi_qty = $this->quantity . ' FYI Pads';
                    break;
                default:
                    $this->quantity = 4;
                    $this->bcfyi_qty = $this->quantity . ' FYI Pads';
            }
        }

        if ($prod_layout == 'SBCFYI' || $prod_layout == 'ABCFYI' || $prod_layout == 'PBCFYI') {
            switch ($request->bc_qty) {
                case '24':
                    $this->quantity = 24;
                    $this->bcfyi_qty = '250 BCs + 4 FYI Pads';
                    break;
                case '28':
                    $this->quantity = 28;
                    $this->bcfyi_qty = '250 BCs + 8 FYI Pads';
                    break;
                case '54':
                    $this->quantity = 54;
                    $this->bcfyi_qty = '500 BCs + 4 FYI Pads';
                    break;
                case '58':
                    $this->quantity = 58;
                    $this->bcfyi_qty = '500 BCs + 8 FYI Pads';
                    break;
                default:
                    $this->quantity = 24;
                    $this->bcfyi_qty = '250 BCs + 4 FYI Pads';
            }
        }
        // // // // // End of qty with description // // // // //

        $cartItem = \Cart::add($product->id, $product->prod_name, $this->quantity, '0', [
            'prod_layout' => $prod_layout,
            'prod_descr' => session('prod_descr'),
            'proof_path' => $pathToCartProof,
            'bc_qty' => $this->bcfyi_qty,
            'bc_name' => $request->bc_name,
            'bc_title' => $request->bc_title,
            'bc_email' => $request->bc_email,
            'bc_phone' => $request->bc_phone,
            'bc_fax' => $request->bc_fax,
            'bc_cell' => $request->bc_cell,
            'bc_address1' => $request->bc_address1,
            'bc_address2' => $request->bc_address2,
            'bc_city' => $request->bc_city,
            'bc_state' => $request->bc_state,
            'bc_zip' => $request->bc_zip,
            'bc_name2' => $request->bc_name2,
            'bc_title2' => $request->bc_title2,
            'bc_email2' => $request->bc_email2,
            'bc_phone2' => $request->bc_phone2,
            'bc_fax2' => $request->bc_fax2,
            'bc_cell2' => $request->bc_cell2,
            'bc_address1b' => $request->bc_address1b,
            'bc_address2b' => $request->bc_address2b,
            'bc_city2' => $request->bc_city2,
            'bc_state2' => $request->bc_state2,
            'bc_zip2' => $request->bc_zip2,
            'sp_instr' => $request->bc_specialInstructions,
        ]);

        return redirect()->action([CartView::class, 'viewCart'], compact('product', 'username'));
    }

    public function render()
    {
        return view('livewire.business-card');
    }
}
