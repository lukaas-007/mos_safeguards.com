<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

Route::get('/about', function () {
    return view('about.index');
})->name('about');

Route::prefix('/cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add/{product:slug}', [CartController::class, 'add'])->name('add');
    Route::post('/remove/{product:slug}', [CartController::class, 'remove'])->name('remove');
    Route::post('/update-quantity/{product:slug}', [CartController::class, 'updateQuantity'])->name('update-quantity');
});


Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/product/{product:slug}', [ShopController::class, 'view'])->name('shop.show');


Route::post('/contact', function (Request $request) {
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'about' => 'required',
        'message' => 'required',
    ]);

    Mail::to('vanbriemenlucas@gmail.com')->send(new ContactFormMail($validatedData));

    return back()->with('success', 'Your message has been sent!');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
