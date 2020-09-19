@extends('layouts.app')

@section('content')
    <div class="container text-center font-weight-bold">
        Yaay, Order Completed! <br> Thank You, {{ auth()->user()->name }} !
    </div>
@endsection
