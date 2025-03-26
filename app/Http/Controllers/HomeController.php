<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $reviews = Review::inRandomOrder()->limit(10)->get();

        return view('home.index', with([
            'reviews' => $reviews
        ]));
    }
}
