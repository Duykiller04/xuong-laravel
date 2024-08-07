@extends('admin.layouts.master')

@section('title')
    Thêm mới thuộc tính color
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
                        Thêm mới thuộc tính color
                    </h5>
                </div>
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
                    <form action="{{ route('admin.productColors.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 col-6">
                            <label for="name">Name Color</label>
                            <input type="color" id="name" class="form-control" name="name">
                        </div>
                        <div class="">
                            <button class="btn btn-primary" type="submit">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection