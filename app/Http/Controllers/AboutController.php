<?php

namespace App\Http\Controllers;

use App\Models\Review;

class AboutController extends Controller
{
    public function index()
    {
        $reviews = Review::inRandomOrder()->limit(10)->get();

        return view('about.index', [
                'reviews' => $reviews
            ]);
    }
}
