<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.orders.';
    public function index()
    {
        $data = Order::query()->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $data = Order::query()->with('orderItems')->where('id', $order->id)->firstOrFail();
        $user = User::query()->findOrFail($data->user_id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $data = Order::query()->with('orderItems')->where('id', $order->id)->firstOrFail();
        $user = User::query()->findOrFail($data->user_id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        try {
            $order->update($request->all());
            return back()->with('success','Cập nhật thành công đơn hàng');
        } catch (\Exception $e) {
            return back()->with('error','Lỗi cập nhật đơn hàng');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
