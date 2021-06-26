<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function getProducts($cart_id)
    {
        return Cart::find($cart_id)->products;
    }

}
