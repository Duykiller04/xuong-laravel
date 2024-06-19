@extends('admin.layouts.master')

@section('title')
    Thông tin thuộc tính size
@endsection

@section('content')
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div
                class="page-title-box d-sm-flex align-items-center justify-content-between"
            >
                <h4 class="mb-sm-0">Datatables</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);"
                                >Tables</a
                            >
                        </li>
                        <li class="breadcrumb-item active">
                            Datatables
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">
                        Thông tin thuộc tính: {{$productSize->name}}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3 col-6">
                        <label for="name">Name Size</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{$productSize->name}}" disabled>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('admin.productSizes.edit', $productSize) }}" class="btn btn-primary mb-3 me-3">Sửa</a>
                        <form action="{{ route('admin.productSizes.destroy', $productSize) }}" method="post">
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