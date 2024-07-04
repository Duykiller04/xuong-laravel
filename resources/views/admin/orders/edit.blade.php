@extends('admin.layouts.master')

@section('title')
    Sửa đơn hàng
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Order</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                        <li class="breadcrumb-item active">Order Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order #{{ $data->id }}</h5>
                        <div class="flex-shrink-0">
                            <a href="apps-invoices-details.html" class="btn btn-success btn-sm"><i
                                    class="ri-download-2-fill align-middle me-1"></i> Invoice</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap align-middle table-borderless mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col">Product Details</th>
                                    <th scope="col">Item Price Sale</th>
                                    <th scope="col">Item Price Regular</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col" class="text-end">Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                {{-- @dd($data->orderItems->toArray()) --}}
                                @foreach ($data->orderItems as $key => $item)
                                    {{-- @dd($item) --}}
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    @php
                                                        $url = $item->product_img_thumbnail;
                                                        if (!Str::contains($url, 'http')) {
                                                            $url = Storage::url($url);
                                                        }
                                                    @endphp
                                                    <img src="{{ $url }}" alt="" class="img-fluid d-block">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-15"><a href="apps-ecommerce-product-details.html"
                                                            class="link-primary">{{ $item->product_name }}</a></h5>
                                                    <p class="text-muted mb-0">Color: <span
                                                            class="fw-medium">{{ $item->variant_color_name }}</span></p>
                                                    <p class="text-muted mb-0">Size: <span
                                                            class="fw-medium">{{ $item->variant_size_name }}</span></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ number_format($item->product_price_sale) }} VNĐ</td>
                                        <td>{{ number_format($item->product_price_regular) }} VNĐ</td>
                                        <td>{{ $item->quatity }}</td>
                                        <td class="fw-medium text-end">
                                            @php
                                                $totalAmount =
                                                    $item->quatity *
                                                    ($item->product_price_sale ?: $item->product_price_regular);
                                                echo number_format($totalAmount) . 'VNĐ';
                                                $total += $totalAmount;
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="border-top border-top-dashed">
                                    <td colspan="3"></td>
                                    <td colspan="2" class="fw-medium p-0">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr class="border-top border-top-dashed">
                                                    <th scope="row">Total (VNĐ) :</th>
                                                    <th class="text-end">{{ number_format($total) }}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order Status</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="profile-timeline">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @php
                                $status_order = [
                                    'pending',
                                    'confirmed',
                                    'preparing_goods',
                                    'shipping',
                                    'delivered',
                                    'canceled',
                                ];
                                $status_payment = ['unpaid', 'paid'];
                                $is_disabled = true;
                            @endphp
                            <form action="{{ route('admin.order.update', $data) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col-md-6 col-12">
                                        <select name="status_order" id="" class="form-control">
                                            @foreach ($status_order as $item)
                                                <option value="{{ $item }}"
                                                    @php
                                                        if($data->status_order == $item){
                                                            echo 'selected';
                                                            $is_disabled = false;
                                                        }
                                                        if ($is_disabled == true) {
                                                            echo 'disabled';
                                                        } 
                                                    @endphp>
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6 col-12">
                                        <select name="status_payment" id="" class="form-control">
                                            @foreach ($status_payment as $item)
                                                <option value="{{ $item }}"
                                                    @if ($data->status_payment == $item) selected @endif>
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-12 d-flex justify-content-center">
                                        <button class="btn btn-primary" style="width: 900px" type="submit">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end accordion-->
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="card-title flex-grow-1 mb-0">Customer Details</h5>
                        <div class="flex-shrink-0">
                            <a href="" class="link-secondary">View Profile</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0 vstack gap-3">
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="theme/assets/images/users/avatar-3.jpg" alt=""
                                        class="avatar-sm rounded">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-14 mb-1">{{ $data->user_name }}</h6>
                                    <p class="text-muted mb-0">{{ $user->type }}</p>
                                </div>
                            </div>
                        </li>
                        <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $data->user_email }}</li>
                        <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{ $data->user_phone }}</li>
                    </ul>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Billing Address
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                        <li class="fw-medium fs-14"><span class="fs-6">Tên người mua:</span> {{ $data->user_name }}
                        </li>
                        <li><span class="fs-6">Email:</span> {{ $data->user_email }}</li>
                        <li><span class="fs-6">Phone:</span> {{ $data->user_phone }}</li>
                        <li><span class="fs-6">Địa chỉ:</span> {{ $data->user_address }}</li>
                        <li><span class="fs-6">Note:</span> {{ $data->user_note }}</li>
                        <li><span class="fs-6">Ngày đặt hàng:</span> {{ $data->created_at }}</li>
                    </ul>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Shipping
                        Address</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                        <li class="fw-medium fs-14"><span class="fs-6">Tên người nhận:</span>
                            {{ $data->ship_user_name ?: $data->user_name }}</li>
                        <li><span class="fs-6">Email:</span> {{ $data->ship_user_email ?: $data->user_email }}</li>
                        <li><span class="fs-6">Phone:</span> {{ $data->ship_user_phone ?: $data->user_phone }}</li>
                        <li><span class="fs-6">Địa chỉ:</span> {{ $data->ship_user_address ?: $data->user_address }}
                        </li>
                        <li><span class="fs-6">Note:</span> {{ $data->ship_user_note ?: $data->user_note }}</li>
                    </ul>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
