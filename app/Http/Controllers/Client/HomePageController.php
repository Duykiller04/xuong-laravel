<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $products = Product::query()->latest('id')->limit(4)->get();
        return view('client.index', compact('products'));
    }
}
