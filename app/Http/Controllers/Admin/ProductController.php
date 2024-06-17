<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    const PATH_VIEW = 'admin.products.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::query()->with(['catalogue', 'tags'])->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catalogues = Catalogue::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('catalogues', 'colors', 'sizes', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataProduct = $request->except(['product_variants', 'tags', 'product_gallery']);
        $dataProduct['is_active'] = isset($dataProduct['is_active']) ? 1: 0;
        $dataProduct['is_hot_deal'] = isset($dataProduct['is_hot_deal']) ? 1 : 0;
        $dataProduct['is_good_deal'] = isset($dataProduct['is_good_deal']) ? 1: 0;
        $dataProduct['is_new'] = isset($dataProduct['is_new']) ? 1 : 0;
        $dataProduct['is_show_home'] = isset($dataProduct['is_show_home']) ? 1 : 0;
        $dataProduct['slug'] = Str::slug($dataProduct['name']) . '-' . $dataProduct['sku'];
        if ($dataProduct['img_thumbnail']) {
            $dataProduct['img_thumbnail'] = Storage::put('products', $dataProduct['img_thumbnail']);
        }

        $dataProductVariantsTmp = $request->product_variants;
        $dataProductVariants = [];
        foreach ($dataProductVariantsTmp as $key => $item) {
            $tmp = explode('-', $key);
            $dataProductVariants[] = [
                'product_size_id' => $tmp[0],
                'product_color_id' => $tmp[1],
                'quantity' => $item['quantity'] ?? 0,
                'image' => $item['image'] ?? null,
            ];
        }

        $dataProductTags = $request->tags;
        $dataProductGalleries = $request->product_gallery ?: [];
        
        try {
            DB::beginTransaction();
            /** @var Product $product */
            $product = Product::query()->create($dataProduct);
                foreach ($dataProductVariants as $dataProductVariant) {
                    $dataProductVariant['product_id'] = $product->id;
                    
                    if ($dataProductVariant['image']) {
                        $dataProductVariant['image'] = Storage::put('products', $dataProductVariant['image']);
                    }

                    ProductVariant::query()->create($dataProductVariant);
            }
    
            $product->tags()->attach($dataProductTags);

            foreach ($dataProductGalleries as $image) {
                ProductGallery::query()->create([ 
                    'product_id' => $product->id, 
                    'image' => Storage::put('products', $image)
                ]);
            }

            DB::commit();

            return redirect()->route('admin.products.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $sku)
    {
        $product = Product::query()->where('sku', 'like', $sku)->first();
        $id = $product->id;
        $catalogues = Catalogue::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        $variants = Product::with('variants')->find($id)->variants;
        $galleries = Product::with('galleries')->find($id)->galleries;
        $productTags = Product::with('tags')->find($id)->tags;
        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'catalogues', 'colors', 'sizes', 'tags', 'variants', 'galleries', 'productTags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $sku)
    {
        $product = Product::query()->where('sku', 'like', $sku)->first();
        $id = $product->id;
        $catalogues = Catalogue::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        $variants = Product::with('variants')->find($id)->variants;
        $galleries = Product::with('galleries')->find($id)->galleries;
        $productTags = Product::with('tags')->find($id)->tags;
        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'catalogues', 'colors', 'sizes', 'tags', 'variants', 'galleries', 'productTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $dataProduct = $request->except(['product_variants', 'tags', 'product_gallery']);
        $dataProduct['is_active'] = isset($dataProduct['is_active']) ? 1: 0;
        $dataProduct['is_hot_deal'] = isset($dataProduct['is_hot_deal']) ? 1 : 0;
        $dataProduct['is_good_deal'] = isset($dataProduct['is_good_deal']) ? 1: 0;
        $dataProduct['is_new'] = isset($dataProduct['is_new']) ? 1 : 0;
        $dataProduct['is_show_home'] = isset($dataProduct['is_show_home']) ? 1 : 0;
        $dataProduct['slug'] = Str::slug($dataProduct['name']) . '-' . $dataProduct['sku'];
        $galleries = Product::with('galleries')->find($product->id)->galleries->toArray();
        
        if ($request->has('product_gallery')) {
            foreach ($request->product_gallery as $key => $img) {
                if ($img != null) {
                    $imgPath = Storage::put('products', $img);
                    ProductGallery::updateOrCreate(['id' => $galleries[$key]['id']], ['image' => $imgPath]);
                }
            }
        }

        try {
            DB::beginTransaction();
            /** @var Product $product */
            if ($dataProduct['img_thumbnail']) {
                $dataProduct['img_thumbnail'] = Storage::put('products', $dataProduct['img_thumbnail']);
            }
            $product->update($dataProduct);
            if ($request->has('product_variants')) {
                foreach ($request->product_variants as $key => $variant) {
                    if (!is_null($variant['quantity'])) {
                        $tmp = explode('-', $key);
                        $variant['product_size_id'] = $tmp[0];
                        $variant['product_color_id'] = $tmp[1];
                        
                        if (isset($variant['image'])) {
                            $variant['image'] = Storage::put('products', $variant['image']);
                        }

                        ProductVariant::updateOrCreate([
                                'product_id' => $product->id,
                                'product_size_id' => $variant['product_size_id'],
                                'product_color_id' => $variant['product_color_id'],
                            ],$variant
                        );
                    }
                }
            }

            if ($request->has('tags')) {
                $product->tags()->sync($request->tags);
            }else{
                $product->tags()->sync($product->tags);
            }

            DB::commit();

            return back();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            DB::transaction(function () use ($product){ 
                $product->tags()->sync([]);
                $product->galleries()->delete();
                $product->variants()->delete();
                $product->delete();
            }, 3);
            return redirect()->route('admin.products.index');
        } catch (\Exception $exception) {
            return back();
        }
    }
}
