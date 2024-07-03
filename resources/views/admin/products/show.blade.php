@extends('admin.layouts.master')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Chi tiết sản phẩm: {{ $product->name }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">
                        Thông tin
                    </h4>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <div>
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $product->name }}" disabled />
                                </div>

                                <div class="mt-3">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="text" class="form-control" id="sku" name="sku"
                                        value="{{ $product->sku }}" disabled />
                                </div>

                                <div class="mt-3">
                                    <label for="price_regular" class="form-label">Price Regular</label>
                                    <input type="number" class="form-control" name="price_regular" id="price_regular"
                                        value="{{ $product->price_regular }}" disabled>
                                </div>

                                <div class="mt-3">
                                    <label for="price_sale" class="form-label">Price Sale</label>
                                    <input type="number" class="form-control" name="price_sale" id="price_sale"
                                        value="{{ $product->price_sale }}" disabled>
                                </div>

                                <div class="mt-3">
                                    <label for="catalogue_id" class="form-label">Catalogues</label>
                                    <select id="" class="form-select" name="catalogue_id" id="catalogue_id" disabled >
                                        @foreach ($catalogues as $id => $name)
                                            <option value="{{ $id }}"
                                                @if ($product->catalogue_id == $id) selected @endif>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="img_thumbnail" class="form-label">Img Thumbnail</label><br>
                                    @php
                                        $url = $product->img_thumbnail;
                                        if (!Str::contains($url, 'http')) {
                                            $url = Storage::url($url);
                                        }
                                    @endphp
                                    <img src="{{ $url }}" alt="" width="320px">
                                </div>

                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-check form-switch form-switch-primary">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                                id="is_active" @if ($product->is_active == 1) checked @endif disabled>
                                            <label class="form-check-label" for="is_active">Is Active</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check form-switch form-switch-warning">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="is_hot_deal" id="is_hot_deal"
                                                @if ($product->is_hot_deal == 1) checked @endif disabled>
                                            <label class="form-check-label" for="is_hot_deal">Is Hot Deal</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check form-switch form-switch-success">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="is_good_deal" id="is_good_deal"
                                                @if ($product->is_good_deal == 1) checked @endif disabled>
                                            <label class="form-check-label" for="is_good_deal">Is Good Deal</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check form-switch form-switch-danger">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_new"
                                                id="is_new" @if ($product->is_new == 1) checked @endif disabled>
                                            <label class="form-check-label" for="is_new">Is New</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check form-switch form-switch-info">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="is_show_home" id="is_show_home"
                                                @if ($product->is_show_home == 1) checked @endif disabled>
                                            <label class="form-check-label" for="is_show_home">Is Show Home</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mt-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="2" disabled>{{ $product->description }}</textarea>
                                    </div>
                                    <div class="mt-3">
                                        <label for="material" class="form-label">Material</label>
                                        <textarea class="form-control" name="material" id="material" rows="2" disabled>{{ $product->material }}</textarea>
                                    </div>
                                    <div class="mt-3">
                                        <label for="user_manual" class="form-label">User Manual</label>
                                        <textarea class="form-control" name="user_manual" id="user_manual" rows="2" disabled>{{ $product->user_manual }}</textarea>
                                    </div>
                                    <div class="mt-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea class="form-control" name="content" id="content" disabled>{{ $product->content }}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>

    <div class="row" style="height: 300px; overflow: scroll;">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">
                        Biến thể
                    </h4>
                </div>
                <!-- end card header -->
                <div class="card-body p-4">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle text-center">
                                <tr>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th style="width:300px">Quantity</th>
                                    <th>Image</th>
                                </tr>
                                {{-- @php
                                    $countColor = count($colors);
                                @endphp --}}
                                @foreach ($sizes as $sizeID => $sizeName)
                                    @foreach ($colors as $colorID => $colorName)
                                        <tr>
                                            <td rowspan="">{{ $sizeName }}</td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <div
                                                    style="width: 50px; height: 50px; background-color: {{ $colorName }}">
                                                </div>
                                            </td>
                                            @foreach ($variants as $variant)
                                                @if ($variant['product_size_id'] == $sizeID && $variant['product_color_id'] == $colorID)
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="product_variants[{{ $sizeID . '-' . $colorID }}][quantity]"
                                                            value="{{ $variant['quantity'] }}" disabled>
                                                    </td>
                                                @endif
                                                @if ($variant['product_size_id'] == $sizeID && $variant['product_color_id'] == $colorID)
                                                    <td>
                                                        @php
                                                            $url = $variant['image'];
                                                            if (!Str::contains($url, 'http')) {
                                                                $url = Storage::url($url);
                                                            }
                                                        @endphp
                                                        <img src="{{ $url }}" alt="" width="100px">
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">
                        Gallery
                    </h4>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">

                            @foreach ($galleries as $gallery_id => $gallerie)
                                <div class="col-md-4">
                                    <div>
                                        <label for="">Gallery {{ $gallery_id + 1 }}</label><br>
                                        @php
                                            $url = $gallerie['image'];
                                            if (!Str::contains($url, 'http')) {
                                                $url = Storage::url($url);
                                            }
                                        @endphp
                                        <img src="{{ $url }}" alt="" width="150px">
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">
                        Tags
                    </h4>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div>
                                    <label for="tags" class="form-label">Tag</label>
                                    <select name="tags[]" id="tags" class="form-select" multiple disabled>
                                        @foreach ($tags as $id => $name)
                                            <option value="{{ $id }}"
                                            @for ($i = 0; $i < count($productTags); $i++)
                                                @if ($productTags[$i]->id == $id)
                                                    selected
                                                @endif
                                            @endfor>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex justify-content-center">
                    <div>
                        <a href="{{ route('admin.products.edit', $product->sku) }}"
                            class="btn btn-warning ms-3 me-3">Sửa</a>
                    </div>
                    <div class="">
                        <form action="{{ route('admin.products.destroy', $product) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Chắc chắn không?')" type="submit"
                                class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection

@section('script-libs')
    <script src="https:////cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
