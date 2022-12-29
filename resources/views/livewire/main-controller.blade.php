<div class="container">
    <div wire:ignore class="col-lg-6 mb-3 mt-3">
        <label for="filterCategory">Select Category</label>
        <select id="filterCategory" class="form-select form-select-sm" name="categories[]" multiple="multiple">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-5">
                <a class="text-decoration-none"
                   href="{{route('selectProduct',[$product->category->slug, $product->slug])}}">
                    <div class="product-card shadow-sm p-3 bg-body rounded">
                        <div class="wrap-product-image mb-3">
                            <img src="{{asset('public/storage/photos/'.$product->img)}}" class="product-image"
                                 alt="{{$product->name}}">
                        </div>

                        <div class="wrap-product-data">
                            <h3 class="text-dark text-center fs-4 mb-3">{{$product->name}}</h3>
                            <p class="card-text text-dark">{{$product->description ?? ''}}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>

</div>
<style>
    .product-card .product-image {
        height: 100px;
        width: 100%;
        object-fit: contain;
        object-position: center;
    }

    .product-card-singe .product-image {
        object-fit: contain;
        max-width: 350px;
        object-position: center;
    }

    .card-text {
        word-break: break-all;
    }


</style>
