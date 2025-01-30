<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

// Route::get('/about', function () {
//     return view('about.index');
// })->name('about');

Route::resource('/shop', controller: ShopController::class);

Route::get('/shop/{slug}', function ($slug) {
    return view('shop.show', ['slug' => $slug]);
})->name('shop.show');

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
