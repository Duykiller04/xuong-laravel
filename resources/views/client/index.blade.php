@extends('client.layouts.master')

@section('content')
    @if (Session::has('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Thành công",
                text: " {{ session('success') }} ",
                timer: 2500
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Lỗi",
                text: " {{ session('error') }} ",
            });
        </script>
    @endif
    <div class="row p-sm-5 ">
        @foreach ($products as $item)
            <div class="col-6 col-sm-6 col-lg-3 mb-5">
                <div class="card" style="width: 18rem;">
                    @php
                        $url = $item->img_thumbnail;
                        if (!Str::contains($url, 'http')) {
                            $url = Storage::url($url);
                        }
                    @endphp
                    <img src="{{ $url }}" class="card-img-top" alt="..."
                        style=" max-width: 100%;
                        height: 300px;
                        object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($item->name, 30) }}</h5>
                        <p class="card-text">{{ Str::limit($item->description, 30) }}</p>
                        <a href="{{ route('product.detail', $item->slug) }}" class="btn btn-primary">Chi tiết sản phẩm</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
