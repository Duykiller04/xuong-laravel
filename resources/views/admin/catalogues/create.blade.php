@extends('admin.layouts.master')

@section('title')
    Thêm mới danh mục sản phẩm
@endsection

@section('content')


    <form action="{{route('admin.catalogues.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">
                            Thêm mới danh mục sản phẩm
                        </h4>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">

                                <div class="col-lg-5">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                                </div>

                                <div class="col-lg-5">
                                    <label for="cover">File:</label>
                                    <input type="file" name="cover" id="cover" class="form-control">
                                </div>

                                <div class="col-lg-2">
                                    <label for="">Is Active</label> <br>
                                    <div class="form-check form-switch form-switch-primary">
                                        <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck2"  name="is_active" value="1"> 
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>

                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </form>
@endsection