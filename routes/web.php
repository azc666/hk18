<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Livewire\CartView;
use App\Http\Livewire\PlaceOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Livewire\ShowConfirmation;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\TitlesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthLocationController;
// use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('landing');
});

// Route::redirect(uri:'/landing', destination: 'login');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/info', function () {
    return phpinfo();
    });
    Route::get('/testes', function () {
    return view('testes');
    });
    Route::get('/categories', function () {
        return view('categories');
    })->name('categories');

    Route::get('/category/staff', [CategoryController::class, 'showStaffCategories'])->name('staff');
    Route::get('/category/associate', [CategoryController::class, 'showAssociateCategories'])->name('associate');
    Route::get('/category/partner', [CategoryController::class, 'showPartnerCategories'])->name('partner');
    Route::get('/category/nametag', [CategoryController::class, 'showNametagCategories'])
    ->name('nametag');

    Route::get('/categories/{category}', [CategoryController::class, 'show']);

    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

    // Route::get('create-proof', [ProductController::class, 'createProof'])->name('create-proof');

    Route::get('pdf-view', [ProductController::class, 'createProof'])->name('pdf-view');

    Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generatePDF');

    Route::get('contact', [ContactController::class, 'index'])->name('contact');
    Route::post('contact', [ContactController::class, 'submitMessage']);

    Route::get('cart', [CartController::class, 'index'])->name('cart');

    Route::get('viewCart', [CartView::class, 'viewCart'])->name('viewCart');

    Route::get('storecart', [CartController::class, 'storeCart'])->name('storecart');
    Route::get('restorecart', [CartController::class, 'restoreCart'])->name('restorecart');
    Route::get('destroycart', [CartController::class, 'destroyCart'])->name('destroycart');
    Route::get('destroyrow/{rowId}', [CartView::class, 'destroyRow'])->name('destroyrow');
    Route::get('editrow/{rowId}', [CartView::class, 'editRow'])->name('editrow');
    Route::get('emailrow/{rowId}', [CartView::class, 'emailRow'])->name('emailrow');

    Route::get('restoreOrder', [CartView::class, 'restoreOrder'])->name('restoreOrder');
    Route::post('postDate', [CartView::class, 'postDate'])->name('postDate');

    Route::post('placeOrder', [PlaceOrder::class, 'placeOrder'])->name('placeOrder');
    Route::get('show-confirmation', [ShowConfirmation::class, 'showConfirmation'])->name('show-confirmation');

    Route::get('titles', [TitlesController::class, 'index'])->name('titles');
    Route::get('orders', [OrdersController::class, 'index'])->name('orders');

    Route::get('/auth-location', [AuthLocationController::class, 'index'])->name('auth-location');

});