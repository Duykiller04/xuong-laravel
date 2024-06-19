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
            DB::beginTransaction();
            ProductColor::create($request->all());
            DB::commit();
            return redirect()->route('admin.productColors.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
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
            DB::beginTransaction();
            $productColor->update($request->all());
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
    public function destroy(ProductColor $productColor)
    {
        try {
            DB::beginTransaction();
            $productColor->delete();
            DB::commit();
            return redirect()->route('admin.productColors.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
        }
    }
}
