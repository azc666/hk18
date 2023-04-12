<?php

namespace App\Http\Controllers;

use session;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function show(Category $category, Product $product, Request $request)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);

        // switch ($category->id) {
        //     case 4:
        //         $headerMessage = 'Staff Business Cards';
        //         break;
        //     case 5:
        //         $headerMessage = 'Staff FYI Pads';
        //         break;
        //     case 6:
        //         $headerMessage = 'Staff Combo BCs & FYI Pads';
        //         break;
        //     case 7:
        //         $headerMessage = 'Associate Business Cards';
        //         break;
        //     case 8:
        //         $headerMessage = 'Associate FYI Pads';
        //         break;
        //     case 9:
        //         $headerMessage = 'Partner Business Cards';
        //         break;
        //     case 10:
        //         $headerMessage = 'Partner Business Cards';
        //         break;
        //     case 11:
        //         $headerMessage = 'Partner FYI Pads';
        //         break;
        //     case 12:
        //         $headerMessage = 'Partner Combo BCs & FYI Pads';
        //         break;
        //     case 13:
        //         $headerMessage = 'Associate Double Sided BCs';
        //         break;
        //     case 14:
        //         $headerMessage = 'Partner Double Sided BC';
        //         break;
        //     case 15:
        //         $headerMessage = 'Name Badge';
        //         break;
        //     default:
        //         $headerMessage = 'Your Product';
        //         break;
        // }

        // $product = Product::select('*')->where('id', 112)->first();

        $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
        $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';

        File::delete([$pathToPdf, $pathToWhereJpgShouldBeStored]);

        return view('category.show', compact('category', 'product', 'request', 'headerMessage'));
    }

    public function showNametagCategories(Category $category, Request $request, Product $product)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);
        $product = Product::all();

        return view('category.nametag', compact('category', 'request', 'product'));
    }

    public function showStaffCategories(Category $category, Request $request, Product $product)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);
        $product = Product::all();

        return view('category/staff', compact('category', 'request', 'product'));
    }

    public function showAssociateCategories(Category $category, Request $request, Product $product)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);
        $product = Product::all();

        return view('category/associate', compact('category', 'request', 'product'));
    }

    public function showPartnerCategories(Category $category, Request $request, Product $product)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);
        $product = Product::all();

        return view('category/partner', compact('category', 'request', 'product'));
    }
}