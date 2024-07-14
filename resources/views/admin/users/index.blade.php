@extends('admin.layouts.master')

@section('title')
    Danh sách tài khoản
@endsection

@section('content')
  <!-- start page title -->
  <div class="row">
    <div class="col-12">
        <div
            class="page-title-box d-sm-flex align-items-center justify-content-between"
        >
            <h4 class="mb-sm-0">Danh sách tài khoản</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);"
                            >Tài khoản</a
                        >
                    </li>
                    <li class="breadcrumb-item active">
                        Danh sách
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
                    Danh sách
                </h5>
                <a href="{{route('admin.users.create')}}" class="btn btn-primary mb-3">Thêm mới</a>
            </div>
            <div class="card-body">
                <table
                    id="example"
                    class="table table-bordered dt-responsive nowrap table-striped align-middle"
                    style="width: 100%"
                >
               <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
               </thead>
                
              <tbody>
                @foreach ($data as $item)         
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{ $item->type}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td class="d-flex">
                        <a href="{{route('admin.users.show', $item->id)}}" class="btn btn-primary mb-3 me-2">Xem</a>
                        <a href="{{route('admin.users.edit', $item->id)}}" class="btn btn-warning mb-3 me-2">Sửa</a>
                        <form action="{{route('admin.users.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Chắc chắn chưa?')"
                            class="btn btn-danger mb-3">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection

@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('script-libs')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
     new DataTable("#example",{
     order: [ [0, 'desc'] ]
});
</script>
@endsection