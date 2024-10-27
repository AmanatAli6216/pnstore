<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;



class BaseController extends Controller
{
    public function home(){
        $products=Products::get();
        $new_products=Products::limit(6)->latest()->get();
        return view('front.home',compact('products','new_products'));
    }

    public function shop(){
        return view('front.shop');
    }

    public function aboutus(){
        return view('front.aboutus');
    }
    
    public function contactus(){
        return view('front.contactus');
    }


    public function cart(){
        return view('front.cart');
    }

    public function productview(){
        return view('front.productview');
    }

}

