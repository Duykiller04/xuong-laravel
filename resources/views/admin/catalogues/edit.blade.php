@extends('admin.layouts.master')

@section('title')
    Cập nhật danh mục sản phẩm: {{ $model->name }}
@endsection

@section('content')

    <form action="{{route('admin.catalogues.update', $model->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">
                            Cập nhật danh mục sản phẩm: {{ $model->name }}
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

                                <div class="col-lg-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{ $model->name }}">
                                </div>

                                <div class="col-lg-2">
                                    <label>Cover</label><br>
                                    <img src="{{ Storage::url($model->cover) }}" alt="" width="100px">
                                </div>

                                <div class="col-lg-4">
                                    <label for="cover">File:</label>
                                    <input type="file" name="cover" id="cover" class="form-control">
                                </div>

                                <div class="col-lg-3">
                                    <label for="">Is Active</label> <br>
                                    <div class="form-check form-switch form-switch-primary">
                                        <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck2"  name="is_active" value="1" @if ($model->is_active) checked @endif> 
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

@section('scripts')
    @if (session()->has('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Thành công",
            text: " {{ session('success') }} ",
            timer: 2500
        });
    </script>
    @endif
    @if (session()->has('error'))
    <script>
        Swal.fire({
        icon: "error",
        title: "Lỗi",
        text: " {{ session('success') }} ",
        });
    </script>
    @endif
@endsection

