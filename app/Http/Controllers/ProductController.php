<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $e = request('encrypt');
        if ($e && app('hash')->check(env('APP_KEY'), $e)) {
            $this->middleware('auth', ['except' => ['product.show']]);
        } else {
            $this->middleware('auth');
        }
    }

    public function show (Request $request, Product $product, Category $category)
    {
        Session::put('prod_id', $product->id);

        $titles = '';
        if ($product->id == 101 || $product->id == 104 || $product->id == 107) {
            $titles = Title::where('type', 'Staff')->orderBy('title')->pluck('title', 'title');
        }
        if ($product->id == 102 || $product->id == 105 || $product->id == 108 || $product->id == 110) {
            $titles = Title::where('type', 'Associate')->orderBy('title')->pluck('title', 'title');
        }
        if ($product->id == 103 || $product->id == 106 || $product->id == 109 || $product->id == 111) {
            $titles = Title::where('type', 'Partner')->orderBy('title')->pluck('title', 'title');
        }

        switch ($product->id) {
            case 101:
                $headerMessage = 'Staff Business Card';
                break;
            case 102:
                $headerMessage = 'Associate Business Card';
                break;
            case 103:
                $headerMessage = 'Partner Business Card';
                break;
            case 104:
                $headerMessage = 'Staff Combo BC + FYI Pads';
                break;
            case 105:
                $headerMessage = 'Associate Combo BC + FYI Pads';
                break;
            case 106:
                $headerMessage = 'Partner Combo BC + FYI Pads';
                break;
            case 107:
                $headerMessage = 'Staff FYI Pads';
                break;
            case 108:
                $headerMessage = 'Associate FYI Pads';
                break;
            case 109:
                $headerMessage = 'Partner FYI Pads';
                break;
            case 110:
                $headerMessage = 'Associate Double Sided BCs';
                break;
            case 111:
                $headerMessage = 'Partner Double Sided BC';
                break;
            case 112:
                $headerMessage = 'Name Badge';
                break;
            default:
                $headerMessage = 'Your Product';
                break;
        }

        session()->put('headerMessage', $headerMessage);
        session()->put('badgename', $request->badgename);
        $badgename = session('badgename');

        return view('product.show', compact('product', 'category', 'request', 'titles', 'headerMessage', 'badgename'));
    }

    public function createProof (Request $request) {
        $headerMessage = session()->get('headerMessage', 'default');
// dd('here i am again');
        $tagname = $request->badgename;
        // dd($tagname);
        Session::put('tagname', $request->badgename);
        $product = Product::where('id', 112);

        // return view('product.showData', compact('tagname'));
        return view('product.show', compact('tagname', 'headerMessage', 'product'));
    }
}