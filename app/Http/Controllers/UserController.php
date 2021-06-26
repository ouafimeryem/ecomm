<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\Hash;

class UserController extends Controller
{
    //Register
    function register(Request $req){

        $user = new User;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));

        $user->save();

        return $user;
    }

    //login
    function login(Request $req) {
        
        $user = User::where('email', $req->email)->first();
        if(!$user || !Hash::check($req->password, $user->password)) {
            return ["error"=> "Email or password is not matched"];
        }

        return $user;
    }

    function addWishlist(){
        $wishlist= new Wishlist;

        $product->name = $req->input('name');

        $product->save();

        return $product;
    }
    
}
