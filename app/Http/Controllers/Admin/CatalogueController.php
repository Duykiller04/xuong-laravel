<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatalogueRequest;
use App\Http\Requests\UpdateCatalogueRequest;
use App\Models\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CatalogueController extends Controller
{
    const PATH_VIEW = 'admin.catalogues.';
    const PATH_UPLOAD = 'catalogues';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Catalogue::query()->latest('id')->get();
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
    public function store(StoreCatalogueRequest $request)
    {
        $data = $request->except('cover');
        $data['is_active'] ??= 0;
        if($request->hasFile('cover')){
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }

        try {
            DB::beginTransaction();
            Catalogue::query()->create($data);
            DB::commit();
            return redirect()->route('admin.catalogues.index')->with('success','Thêm thành công danh mục sản phẩm');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error','Lỗi thêm danh mục sản phẩm');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Catalogue::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Catalogue::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatalogueRequest $request, string $id)
    {
        $model = Catalogue::query()->findOrFail($id);
        $data = $request->except('cover');
        $data['is_active'] ??= 0;

        if($request->hasFile('cover')){
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }
        $currentCover = $model->cover;
        
        try {
            DB::beginTransaction();
            $model->update($data);

            if($request->hasFile('cover') && $currentCover && Storage::exists($currentCover)){
                Storage::delete($currentCover);
            }
            DB::commit();
            return back()->with('success','Cập nhật thành công danh mục sản phẩm');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error','Lỗi cập nhật danh mục sản phẩm');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Catalogue::query()->findOrFail($id);

        try {
            DB::beginTransaction();
            $model->delete();
            if($model->cover && Storage::exists($model->cover)){
                Storage::delete($model->cover);
            }
            DB::commit();
            return redirect()->route('admin.catalogues.index')->with('success','Xóa thành công danh mục sản phẩm');
            } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error','Lỗi xóa danh mục sản phẩm');
        }
    
    }
}
