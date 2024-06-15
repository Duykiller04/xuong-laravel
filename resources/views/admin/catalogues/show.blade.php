@extends('admin.layouts.master')

@section('title')
    Xem chi tiết danh mục sản phẩm: {{ $model->name }}
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">
                        Chi tiết danh mục sản phẩm: {{ $model->name }}
                    </h4>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">

                            <div class="col-lg-1">
                                <label for="">ID</label>
                                <input type="text" class="form-control" disabled value="{{ $model->id}}">
                            </div>

                            <div class="col-lg-3">
                                <label for="">Name</label>
                                <input type="text" class="form-control" disabled value="{{ $model->name }}">
                            </div>

                            <div class="col-lg-2">
                                <label>Cover</label><br>
                                <img src="{{ Storage::url($model->cover) }}" alt="" width="110px">
                            </div>

                            <div class="col-lg-1">
                                <label for="">Is Active</label> <br>
                                {!! $model->is_active ? '<span class="badge bg-primary">Yes</span>' : '<span class="badge bg-danger">No</span>' !!}
                            </div>

                            <div class="col-lg-2">
                                <label for="">Created At</label> <br>
                                <input type="text" class="form-control" disabled value="{{ $model->created_at }}">
                            </div>

                            <div class="col-lg-2">
                                <label for="">Updated At</label> <br>
                                <input type="text" class="form-control" disabled value="{{ $model->updated_at }}">
                            </div>

                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.catalogues.edit', $model->id) }}" class="btn btn-warning mb-3">Sửa</a>
                                <a href="{{ route('admin.catalogues.destroy', $model->id) }}" onclick="return confirm('Chắc chắn chưa?')" class="btn btn-danger mb-3 ms-3">Xóa</a>
                            </div>

                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection