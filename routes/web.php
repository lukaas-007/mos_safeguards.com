<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Mail\ContactConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('/cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{product:slug}', [CartController::class, 'add'])->name('add');
        Route::post('/remove/{product:slug}', [CartController::class, 'remove'])->name('remove');
        Route::post('/update-quantity/{product:slug}', [CartController::class, 'updateQuantity'])->name('update-quantity');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.update');
    Route::post('/profile/password-update', [ProfileController::class, 'passwordUpdate'])->name('profile_password.update');
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('cart.checkout');
    Route::post('/checkout/{order}', [CheckoutController::class, 'checkoutOrder'])->name('cart.checkout-order');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/failure', [CheckoutController::class, 'failure'])->name('checkout.failure');
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/orders/{order}', [OrderController::class, 'view'])->name('order.view');
});


Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/product/{product:slug}', [ShopController::class, 'view'])->name('shop.show');


Route::post('/contact', function (Request $request) {
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'about' => 'required',
        'message' => 'required',
        'g-recaptcha-response' => 'required|captcha'
    ]);

    Mail::to('vanbriemenlucas@gmail.com')->send(new ContactFormMail($validatedData));
    Mail::to($request->email)->send(new ContactConfirmation($validatedData));


    return back()->with('success', 'Your message has been sent!');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
