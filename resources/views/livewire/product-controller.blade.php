<div class="container mt-5">
    <div class="card">
        <div class="card-header">{{$product->name}}</div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <img style="width: 100%" src="{{asset('public/storage/photos/'.$product->img)}}" class="product-image"
                    alt="{{$product->name}}">
                </div>
                <div class="col-6">
                    <div class="wrap-product-data">
                        <h3 class="text-dark text-center fs-4 mb-3">{{$product->name}}</h3>
                        <p class="card-text">{{$product->description ?? ''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
