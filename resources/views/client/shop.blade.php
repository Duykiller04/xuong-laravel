@extends('client.layouts.master')

@section('title')
    Shop
@endsection

@section('content')
    @include('client.components.breadcrumb', ['pageName' => 'Shop'])

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-9 order-2">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4">
                                <h2 class="text-black h5">Shop All</h2>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Latest
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        <a class="dropdown-item" href="#">Men</a>
                                        <a class="dropdown-item" href="#">Women</a>
                                        <a class="dropdown-item" href="#">Children</a>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuReference" data-toggle="dropdown">
                                        Reference
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <a class="dropdown-item" href="#">Relevance</a>
                                        <a class="dropdown-item" href="#">Name, A to Z</a>
                                        <a class="dropdown-item" href="#">Name, Z to A</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Price, low to high</a>
                                        <a class="dropdown-item" href="#">Price, high to low</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        @foreach ($products as $product)
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border">
                                    <figure class="block-4-image">
                                        <a href="{{ route('product.detail', $product->slug) }}">
                                            @php
                                                $url = $product->img_thumbnail;
                                                if (!Str::contains($url, 'http')) {
                                                    $url = Storage::url($url);
                                                }
                                            @endphp
                                            <img src="{{ $url }}" alt="Image placeholder" class="img-fluid" /></a>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3>
                                            <a
                                                href="{{ route('product.detail', $product->slug) }}">{{ Str::limit($product->name, 14) }}</a>
                                        </h3>
                                        <div class="d-flex justify-content-around">
                                            <p class="text-secondery font-weight-bold"
                                                style="text-decoration: line-through">
                                                {{ number_format($product->price_regular, 0, ',', '.') }} VND
                                            </p>
                                            <h5 class="text-danger font-weight-bold">
                                                {{ number_format($product->price_sale, 0, ',', '.') }} VND
                                            </h5>
                                        </div>
                                        <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-primary">Xem
                                            chi
                                            tiết</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <a href="{{ route('shop') }}">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">
                                Categories
                            </h3>
                        </a>
                        <ul class="list-unstyled mb-0">
                            @foreach ($categories as $category)
                                <li class="mb-1">
                                    <a href="{{ route('shop', $category->id) }}"
                                        class="d-flex"><span>{{ $category->name }}</span>
                                        <span class="text-black ml-auto">{{ $category->products_count }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">
                                Filter by Price
                            </h3>
                            <div id="slider-range" class="border-primary"></div>
                            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white"
                                disabled="" />
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">
                                Size
                            </h3>
                            <label for="s_sm" class="d-flex">
                                <input type="checkbox" id="s_sm" class="mr-2 mt-1" />
                                <span class="text-black">Small (2,319)</span>
                            </label>
                            <label for="s_md" class="d-flex">
                                <input type="checkbox" id="s_md" class="mr-2 mt-1" />
                                <span class="text-black">Medium (1,282)</span>
                            </label>
                            <label for="s_lg" class="d-flex">
                                <input type="checkbox" id="s_lg" class="mr-2 mt-1" />
                                <span class="text-black">Large (1,392)</span>
                            </label>
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">
                                Color
                            </h3>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-danger color d-inline-block rounded-circle mr-2"></span>
                                <span class="text-black">Red (2,429)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-success color d-inline-block rounded-circle mr-2"></span>
                                <span class="text-black">Green (2,298)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-info color d-inline-block rounded-circle mr-2"></span>
                                <span class="text-black">Blue (1,075)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-primary color d-inline-block rounded-circle mr-2"></span>
                                <span class="text-black">Purple (1,075)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
