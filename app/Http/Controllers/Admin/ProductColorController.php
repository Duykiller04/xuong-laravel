<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.productColors.';

    public function index()
    {
        $data = ProductColor::query()->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            ProductColor::create($request->all());
            return redirect()->route('admin.productColors.index')->with('success','Thêm thành công biến thể color');
        } catch (\Exception $e) {
            return back()->with('error','Lỗi thêm biến thể color');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductColor $productColor)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('productColor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductColor $productColor)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('productColor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductColor $productColor)
    {
        try {
            $productColor->update($request->all());
            return back()->with('success','Cập nhật thành công biến thể color');
        } catch (\Exception $e) {
            return back()->with('error','Lỗi cập nhật biến thể color');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductColor $productColor)
    {
        try {
            $productColor->delete();
            return redirect()->route('admin.productColors.index')->with('success','Xóa thành công biến thể color');
        } catch (\Exception $e) {
            return back()->with('error','Lỗi xóa biến thể color');
        }
    }
}
