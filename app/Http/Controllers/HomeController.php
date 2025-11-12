<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $reviews = Review::inRandomOrder()->where('rating', '>=', 4)->limit(20)->get();

        return view('home.index', with([
            'reviews' => $reviews
        ]));
    }
}
