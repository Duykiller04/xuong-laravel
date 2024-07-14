@extends('admin.layouts.master')

@section('title')
    Chi tiết tài khoản:  {{ $user->name }}
@endsection

@section('content')
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header align-items-center d-flex">
                  <h4 class="card-title mb-0 flex-grow-1">Chi tiết tài khoản:  {{ $user->name }}</h4>
              </div><!-- end card header -->
              <div class="card-body">
                  <div class="live-preview">
                      <div class="row gy-4">
                          <div class="col-md-6">
                              <div>
                                  <label for="name" class="form-label">Name</label>
                                  <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled>
                              </div>        
                          </div> 
                          <div class="col-md-6">
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                            </div>        
                        </div> 
                      </div>
                      <div class="row gy-4 mt-3">
                        <div class="col-md-6">
                            <div>
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="text" class="form-control" id="password" name="password" value="{{ $user->password  }}" disabled>                           
                            </div>        
                        </div> 
                        <div class="col-md-6">
                          <div>
                            <label for="password" class="form-label">Type</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ $user->type }}" disabled>
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
@endsection