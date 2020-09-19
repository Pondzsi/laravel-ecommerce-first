@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($products as $product)
            <x-product-card :product="$product"></x-product-card>
        @endforeach
    {{ $products->links() }}
    </div>    
</div>
@endsection
