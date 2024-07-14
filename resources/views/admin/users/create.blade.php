@extends('admin.layouts.master')

@section('title')
    Thêm mới tài khoản
@endsection

@section('content')
<form action="{{route('admin.users.store')}}" method="POST">
    @csrf
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header align-items-center d-flex">
                  <h4 class="card-title mb-0 flex-grow-1">Thêm mới tài khoản</h4>
              </div><!-- end card header -->
              <div class="card-body">
                  <div class="live-preview">
                      <div class="row gy-4">
                          <div class="col-md-6">
                              <div>
                                  <label for="name" class="form-label">Name</label>
                                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
                              </div>        
                          </div> 
                          <div class="col-md-6">
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email')}}">
                            </div>        
                        </div> 
                      </div>
                      <div class="row gy-4 mt-3">
                        <div class="col-md-6">
                            <div>
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password">                           
                            </div>        
                        </div> 
                        <div class="col-md-6">
                            <div>
                                <label for="repassword" class="form-label">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="repassword" name="repassword">
                            </div>        
                        </div> 
                        <div class="col-12">
                          <div>
                            <label for="password" class="form-label">Type</label>
                             <select name="type" id="" class="form-select">
                                 <option value="member" selected>Member</option>
                                <option value="admin">Admin</option>
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
              </div><!-- end card header -->
          </div>
      </div>
      <!--end col-->
    </div>
  </form>
  
@endsection