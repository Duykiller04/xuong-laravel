@extends('admin.layouts.master')

@section('title')
    Thêm mới sản phẩm
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới sản phẩm</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">
                            Thông tin
                        </h4>
                    </div>
                    <!-- end card header -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">

                                <div class="col-md-4">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" />
                                    </div>

                                    <div class="mt-3">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control" id="sku" name="sku"
                                            value="{{ strtoupper(Str::random(8)) }}" />
                                    </div>

                                    <div class="mt-3">
                                        <label for="price_regular" class="form-label">Price Regular</label>
                                        <input type="number" value="0" class="form-control" name="price_regular"
                                            id="price_regular">
                                    </div>

                                    <div class="mt-3">
                                        <label for="price_sale" class="form-label">Price Sale</label>
                                        <input type="number" value="0" class="form-control" name="price_sale"
                                            id="price_sale">
                                    </div>

                                    <div class="mt-3">
                                        <label for="catalogue_id" class="form-label">Catalogues</label>
                                        <select id="" class="form-select" name="catalogue_id"
                                            id="catalogue_id">
                                            @foreach ($catalogues as $id => $name)
                                                <option value="{{ $id }}">
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <label for="img_thumbnail" class="form-label">Img Thumbnail</label>
                                        <input type="file" class="form-control" id="img_thumbnail"
                                            name="img_thumbnail" />
                                    </div>

                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-primary">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="is_active" id="is_active" checked>
                                                <label class="form-check-label" for="is_active">Is Active</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-warning">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="is_hot_deal" id="is_hot_deal" checked>
                                                <label class="form-check-label" for="is_hot_deal">Is Hot Deal</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-success">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="is_good_deal" id="is_good_deal" checked>
                                                <label class="form-check-label" for="is_good_deal">Is Good Deal</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-danger">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="is_new" id="is_new" checked>
                                                <label class="form-check-label" for="is_new">Is New</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-info">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="is_show_home" id="is_show_home" checked>
                                                <label class="form-check-label" for="is_show_home">Is Show Home</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mt-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="2"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="material" class="form-label">Material</label>
                                            <textarea class="form-control" name="material" id="material" rows="2"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="user_manual" class="form-label">User Manual</label>
                                            <textarea class="form-control" name="user_manual" id="user_manual" rows="2"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea class="form-control" name="content" id="content"></textarea>
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
                                <table>
                                    <tr>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Quantity</th>
                                        <th>Image</th>
                                    </tr>
                                    @foreach ($sizes as $sizeID => $sizeName)
                                        @foreach ($colors as $colorID => $colorName)
                                            <tr>
                                                <td>{{ $sizeName }}</td>
                                                <td>
                                                    <div
                                                        style="width: 50px; height: 50px; background-color: {{ $colorName }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control"
                                                        name="product_variants[{{ $sizeID . '-' . $colorID }}][quantity]">
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control"
                                                        name="product_variants[{{ $sizeID . '-' . $colorID }}][image]">
                                                </td>
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

                                <div class="col-md-4">
                                    <div>
                                        <label for="gallery_1" class="form-label">Gallery 1</label>
                                        <input type="file" class="form-control" id="gallery_1"
                                            name="product_gallery[]" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div>
                                        <label for="gallery_2" class="form-label">Gallery 2</label>
                                        <input type="file" class="form-control" id="gallery_2"
                                            name="product_gallery[]" />
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
                                        <select name="tags[]" id="tags" class="form-select" multiple>
                                            @foreach ($tags as $id => $name)
                                                <option value="{{ $id }}">
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
                    <div class="card-header align-items-center d-flex">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </form>
@endsection

@section('script-libs')
    <script src="https:////cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
