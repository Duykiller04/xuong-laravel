<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            ProductSize::create($request->all());
            DB::commit();
            return redirect()->route('admin.productSizes.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
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
    public function update(Request $request, ProductSize $productSize)
    {
        try {
            DB::beginTransaction();
            $productSize->update($request->all());
            DB::commit();
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
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
            return redirect()->route('admin.productSizes.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
        }
    }
}
