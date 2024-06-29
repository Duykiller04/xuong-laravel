<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-6">
                @php
                    $url = $product->img_thumbnail;
                    if (!Str::contains($url, 'http')) {
                        $url = Storage::url($url);
                    }
                @endphp
                <img src="{{ $url }}" class="card-img-top" alt="..."
                    style=" max-width: 100%;
                        max-height: 800px;
                        object-fit: cover;">
            </div>
            <div class="col-md-6">
                <h2 class="text-center">{{ $product->name }}</h2>
                <h5>SKU</h5>
                <p>{{ $product->sku }}</p>
                <h5>Price Regular</h5>
                <p>{{ $product->price_regular }}</p>
                <h5>Price Sale</h5>
                <p>{{ $product->price_sale }}</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <label for="" class="form-check-label mb-3 mt-3">Color</label>
                    @foreach ($colors as $id => $name)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="product_color_id"
                                value="{{ $id }}" id="radio_color_{{ $id }}">
                            <label class="form-check-label" for="radio_color_{{ $id }}">
                                {{ $name }}
                            </label>
                        </div>
                    @endforeach

                    <label for="" class="form-check-label mb-3 mt-3">Size</label>
                    @foreach ($sizes as $id => $name)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="product_size_id"
                                value="{{ $id }}" id="radio_size_{{ $id }}">
                            <label class="form-check-label" for="radio_size_{{ $id }}">
                                {{ $name }}
                            </label>
                        </div>
                    @endforeach

                    <div class="mb-3 mt-3">
                        <label for="quantity" class="form-label"></label>
                        <input type="number" class="form-control" min="1" id="quantity"
                            placeholder="Enter quantity" name="quantity_buy" value="1" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
