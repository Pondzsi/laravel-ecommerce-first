<div class="card m-4 product-card">
    <img class="card-img-top" src="{{ $product->image }}">
    <div class="card-body">
        <h5 class="card-title text-center font-weight-bold">{{ $product->name }}</h5>
        <x-product-price :price="$product->price" />
        <div class="d-flex justify-content-center mt-4">
            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary btn-sm btn-cart-custom">
                Add To Cart
            </a>
        </div>
    </div>
</div>
