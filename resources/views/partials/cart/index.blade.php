@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($cartProducts->count())
            <h2 class="text-center mt-4 mb-4">Your Cart Content</h2>

            <table class="table mt-4">
                <thead class="bg-custom">
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Image</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartProducts as $product)
                        <tr>
                            <td scope="row">{{ $product->name }}</td>
                            <td>
                                <x-product-price :price="$product->price" />
                            </td>
                            <td>
                                <form method="post" action="{{ route('cart.update', $product->id) }}">
                                    @csrf
                                    <select name="quantity" class="custom-select mb-2 mr-sm-2 mb-sm-0 w-50"
                                        onchange='this.form.submit()'>
                                        @for ($index = 1; $index <= $product->attributes->stock; $index++)
                                            @if ($index == $product->quantity)
                                                <option selected value="{{ $index }}">{{ $index }}</option>
                                            @else
                                                <option value="{{ $index }}">{{ $index }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </form>
                            </td>
                            <td><img src="{{ $product->attributes->image }}"></td>
                            <td><a href="{{ route('cart.destroy', $product->id) }}"><img class="pr-2 pb-4 mt-2 cart-icon"
                                        src="/svg/delete.svg"></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                <div class="total-custom">Total:</div> 
                <div class="price">{{ floor(number_format(\Cart::session(auth()->id())->getTotal(), 2, '.', '')) }}
                    <sup>{{ number_format(number_format(\Cart::session(auth()->id())->getTotal(), 2, '.', '') - floor(number_format(\Cart::session(auth()->id())->getTotal(), 2, '.', '')), 2, '.', '') * 100 }}</sup>
                    Lei
            </div>

            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('index') }}" class="mr-4 btn btn-primary btn-cart-custom">
                    Take Me Back To Shopping
                </a>
                <a href="{{ route('cart.checkout') }}" class="ml-4 btn btn-primary btn-cart-custom">
                    Take Me To Checkout
                </a>
            </div>
        @else
            <h2 class="text-center mt-4 mb-4">Your Cart Is Empty...</h2>
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('index') }}" class="btn btn-primary btn-cart-custom">
                    Take Me Back To Shopping
                </a>
            </div>
        @endif
    </div>
@endsection
