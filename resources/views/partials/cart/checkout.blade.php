@extends('layouts.app')

@section('content')
    <div class="container text-center font-weight-bold">

        <form action="{{ route('orders.store') }}" method="post">
            @csrf
            <h2 class="pt-2 pb-4">Checkout</h2>

            <div class="form-group">
                <label for="shipping_fullname">Full Name</label>
                <input type="text" name="shipping_fullname" class="text-center form-control">
            </div>

            <div class="form-group">
                <label for="shipping_state">State</label>
                <input type="text" name="shipping_state" class="text-center form-control">
            </div>

            <div class="form-group">
                <label for="shipping_city">City</label>
                <input type="text" name="shipping_city" class="text-center form-control">
            </div>

            <div class="form-group">
                <label for="shipping_zipcode">Zip</label>
                <input type="number" name="shipping_zipcode" class="text-center form-control">
            </div>

            <div class="form-group">
                <label for="shipping_address">Full Address</label>
                <input type="text" name="shipping_address" class="text-center form-control">
            </div>

            <div class="form-group">
                <label for="shipping_phone">Mobile</label>
                <input type="text" name="shipping_phone" class="text-center form-control">
            </div>

            <button type="submit" class="ml-4 btn btn-primary btn-cart-custom">Place Order</button>

        </form>

    </div>
@endsection
