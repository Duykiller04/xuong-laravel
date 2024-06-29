<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
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
</body>

</html>
