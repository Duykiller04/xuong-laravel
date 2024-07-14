@extends('client.layouts.master')

@section('content')

    @include('client.components.breadcrumb', ['pageName' => 'Cart'])

    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-3">Giỏ hàng</h2>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered dt-responsive nowrap table-striped align-middle mt-5 text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Img</th>
                            <th>Giá thường</th>
                            <th>Giá sale</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(session()->has('cart'))
                            @foreach (session('cart') as $item)
                            {{-- @dd($item) --}}
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    
                                    <td>
                                        @php
                                            $url = $item['img_thumbnail'];
                                            if (!Str::contains($url, 'http')) {
                                                $url = Storage::url($url);
                                            }
                                        @endphp
                                        <img src="{{ $url }}" class="card-img-top" alt="..."
                                            style=" max-width: 100%;
                                                    height: 100px;
                                                    object-fit: cover;">
                                    </td>
                                    <td>{{ $item['price_regular'] }}</td>
                                    <td>{{ $item['price_sale'] }}</td>
                                    <td>{{ $item['product_color']['name'] }}</td>
                                    <td>{{ $item['product_size']['name'] }}</td>
                                    <td>
                                        {{ $item['quantity_buy'] }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h2>Tổng tiền: {{ number_format($totalAmount) }}</h2>
                <form action="{{ route('order.save') }}" method="POST">
                    @csrf
                    <div class="mt-3 mb-3">
                        <label class="form-lable" for="user_name">User Name</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" value="{{ auth()->user()?->name }}">
                    </div>
                    <div class="mt-3 mb-3">
                        <label class="form-lable" for="user_email">User Email</label>
                        <input type="text" class="form-control" name="user_email" id="user_email" value="{{ auth()->user()?->email }}">
                    </div>
                    <div class="mt-3 mb-3">
                        <label class="form-lable" for="user_phone">User Phone</label>
                        <input type="text" class="form-control" name="user_phone" id="user_phone">
                    </div>
                    <div class="mt-3 mb-3">
                        <label class="form-lable" for="user_address">User Address</label>
                        <input type="text" class="form-control" name="user_address" id="user_address">
                    </div>
                    <div class="mt-3 mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Đặt hàng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
