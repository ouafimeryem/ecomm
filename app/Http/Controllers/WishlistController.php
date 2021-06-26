<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WishlistController extends Controller
{
    public function getProducts($Wishlist_id)
    {
        return Wishlist::find($Wishlist_id)->products;
    }
}
