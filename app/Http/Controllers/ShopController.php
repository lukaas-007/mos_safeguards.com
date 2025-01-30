<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all()
            ->where('quantity', '>', 0)
            ->Where('published', 1);

        return view(
            'shop.index',
            [
                'products' => $products,
            ]
        );
    }
}
