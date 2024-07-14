<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(string $id = null)
    {
     
        if($id){
            $products = Product::where('catalogue_id',$id)->latest('id')->paginate(12);
        }else{
            $products = Product::query()->latest('id')->paginate(12);
        }
        $categories = Catalogue::query()->withCount('products')->get();
        return view('client.shop',compact('categories','products'));
    }
}
