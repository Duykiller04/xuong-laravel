<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductSizeRequest;
use App\Http\Requests\UpdateProductSizeRequest;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.productSizes.';

    public function index()
    {
        $data = ProductSize::query()->get();
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
    public function store(StoreProductSizeRequest $request)
    {
        try {
            DB::beginTransaction();
            ProductSize::create($request->all());
            DB::commit();
            return redirect()->route('admin.productSizes.index')->with('success','Thêm thành công biến thể size');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error','Lỗi thêm biến thể size');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSize $productSize)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('productSize'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductSize $productSize)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('productSize'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductSizeRequest $request, ProductSize $productSize)
    {
        try {
            DB::beginTransaction();
            $productSize->update($request->all());
            DB::commit();
            return back()->with('success','Cập nhật thành công biến thể size');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error','Lỗi cập nhật biến thể size');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSize $productSize)
    {
        try {
            DB::beginTransaction();
            $productSize->delete();
            DB::commit();
            return redirect()->route('admin.productSizes.index')->with('success','Xóa thành công biến thể size');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error','Lỗi xóa biến thể size');
        }
    }
}
