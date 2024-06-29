<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function list(){
        $cart = session('cart');
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['quantity_buy'] * ($item['price_sale'] ?: $item['price_regular']);
        }
        return view('client.cart-list', compact('totalAmount'));
    }
    public function add(){
        // dd(\request()->all());
        $product = Product:: query()->findOrFail(\request('product_id')); 
        $productVariant = ProductVariant::query()
            ->with(['product_color', 'product_size'])
            ->where([
                'product_id' => \request('product_id'),
                'product_size_id' => \request('product_size_id'),
                'product_color_id' => \request('product_color_id'),
                ])
            ->firstorFail();

        if (!isset(session('cart')[$productVariant->id] ) ) {
            $data = $product->toArray()
            + $productVariant->toArray()
            + ['quantity_buy' => \request('quantity_buy')];
            session()->put('cart.' . $productVariant->id, $data);
        } else {
            $data = session ('cart') [$productVariant->id];
            $data['quantity_buy'] = \request('quantity_buy');
            session()->put('cart.' . $productVariant->id, $data);
        }
        // dd($data);
        return redirect()->route('cart.list');
    }
}
