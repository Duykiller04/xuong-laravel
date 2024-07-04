@extends('admin.layouts.master')

@section('title')
    Danh sách đơn hàng
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Orders</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Crypto</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row" id="contactList">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center border-0">
                    <h5 class="card-title mb-0 flex-grow-1">All Orders</h5>

                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <div class="row g-2">
                        <div class="col-xl-4 col-md-6">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Search to orders...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xl-3 col-md-6">
                            {{-- <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="ri-calendar-2-line"></i></span>
                                <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" placeholder="Select date" id="range-datepicker" aria-describedby="basic-addon1">
                            </div> --}}
                        </div>
                        <!--end col-->
                        <div class="col-xl-2 col-md-4">
                            <select class="form-control" data-choices data-choices-search-false name="idType"
                                id="idType">
                                <option value="all">Select Status Order</option>
                                <option value="pending">pending</option>
                                <option value="confirmed">confirmed</option>
                                <option value="preparing_goods">preparing_goods</option>
                                <option value="shipping">shipping</option>
                                <option value="delivered">delivered</option>
                                <option value="canceled">canceled</option>
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-xl-2 col-md-4">
                            <select class="form-control" data-choices data-choices-search-false name="idStatus"
                                id="idStatus">
                                <option value="all">Select Status Payment</option>
                                <option value="unpaid">unpaid</option>
                                <option value="paid">paid</option>
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-xl-1 col-md-4">
                            <button class="btn btn-success w-100" onclick="filterData();">Filters</button>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width: 100%">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="sort" data-sort="time" scope="col">Order Date</th>
                                    <th class="sort" data-sort="currency_name" scope="col">Name</th>
                                    <th class="sort" data-sort="currency_name" scope="col">Email</th>
                                    <th class="sort" data-sort="currency_name" scope="col">Phone</th>
                                    <th class="sort" data-sort="currency_name" scope="col">Địa chỉ</th>
                                    <th class="sort" data-sort="currency_name" scope="col">Tổng đơn</th>
                                    <th class="sort" data-sort="status" scope="col">Status Payment</th>
                                    <th class="sort" data-sort="type" scope="col">Status Order</th>
                                    <th class="sort" scope="col">Action</th>
                                </tr>
                            </thead>
                            <!--end thead-->
                            <tbody class="list form-check-all">
                                @foreach ($data as $key => $item)
                                    @php
                                        $carbon = Carbon\Carbon::parse($item->created_at);
                                        $timestamp = $carbon->timestamp;
                                        $formatted = $carbon->format('d M, Y h:iA');
                                        if ($item->status_payment == 'unpaid') {
                                            $classStatusPayment = 'type text-danger';
                                        } else {
                                            $classStatusPayment = 'type text-success';
                                        }
                                        switch ($item->status_order) {
                                            case 'pending':
                                                $classStatusOrder = 'badge bg-danger-subtle text-info text-uppercase';
                                                break;
                                            case 'confirmed':
                                                $classStatusOrder =
                                                    'badge bg-success-subtle text-success text-uppercase';
                                                break;
                                            case 'preparing_goods':
                                                $classStatusOrder = 'badge bg-dark-subtle text-primary text-uppercase';
                                                break;
                                            case 'shipping':
                                                $classStatusOrder =
                                                    'badge bg-primary-subtle text-warning text-uppercase';
                                                break;
                                            case 'delivered':
                                                $classStatusOrder = 'badge bg-info-subtle text-dark text-uppercase';
                                                break;
                                            case 'canceled':
                                                $classStatusOrder =
                                                    'badge bg-warning-subtle text-danger text-uppercase';
                                                break;
                                        }
                                    @endphp
                                    <tr>
                                        <td class="order_date time" data-timestamp="{{ $timestamp }}">{{ $formatted }}
                                        </td>
                                        <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                class="fw-medium link-primary">{{ $item->id }}</a></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);"
                                                    class="flex-grow-1 ms-2 currency_name">{{ $item->user_name }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);"
                                                    class="flex-grow-1 ms-2 currency_name">{{ $item->user_email }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);"
                                                    class="flex-grow-1 ms-2 currency_name">{{ $item->user_phone }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);"
                                                    class="flex-grow-1 ms-2 currency_name">{{ $item->user_address }}</a>
                                            </div>
                                        </td>
                                        <td class="avg_price sort-avg_price" data-av-price="{{ $item->total_price }}">
                                            {{ number_format($item->total_price) }} VNĐ
                                        </td>
                                        <td class="{{ $classStatusPayment }}">{{ $item->status_payment }}</td>
                                        <td class="status">
                                            <span class="{{ $classStatusOrder }}">{{ $item->status_order }}</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top" aria-label="View"
                                                    data-bs-original-title="View">
                                                    <a href="{{ route('admin.order.show', $item) }}"
                                                        class="text-primary d-inline-block">
                                                        <i class="ri-eye-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit"
                                                    data-bs-original-title="Edit">
                                                    <a href="{{ route('admin.order.edit', $item) }}"
                                                        class="text-primary d-inline-block edit-item-btn">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end table-->
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ orders We did not find any orders
                                    for you search.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection

@section('script-libs')
    <!-- list.js min js -->
    <script src="{{ asset('theme/assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('theme/assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!--crypto-orders init-->
    <script src="{{ asset('theme/assets/js/pages/crypto-orders.init.js') }}"></script>
@endsection
