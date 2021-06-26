<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;

class ProductController extends Controller
{
    function addProductToCart(Request $req){
        $product= new Product;
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->img = $req->input('url-img');
        $cart_id = $req->input('cart_id');

        $product->save();

        $cart = Cart::find($cart_id);
        $product->carts()->attach($cart);

        return $product;
    }

    function addProductToWishlist(Request $req){
      $product= new Product;
      $product->name = $req->input('name');
      $product->price = $req->input('price');
      $product->img = $req->input('url-img');
      $wishlist_id = $req->input('wishlist_id');

      $product->save();

      $wishlist = Cart::find($wishlist_id);
      $product->wishlists()->attach($wishlist);

      return $product;
  }


  function deleteFromCart(Request $req){

    $cart_id = $req->input('cart_id');
    $product_id = $req->input('product_id');

    $product = Product::find($product_id);
    $cart = Cart::find($cart_id);
    
    $product->carts()->detach($cart);
        
    return 'Success';

  }
    
  function deleteFromWishlist(Request $req){
    
    $wishlist_id = $req->input('wishlist_id');
    $product_id = $req->input('product_id');

    $product = Product::find($product_id);
    $wishlist = Wishlist::find($wishlist_id);
    
    $product->wishlists()->detach($wishlist);
        
    return 'Success';
  }
  
}