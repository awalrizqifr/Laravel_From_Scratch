@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>
    @if (!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">
            Your cart is empty
        </div>
    @else
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-lg-3 col-md-4">
                    @include('components.product_card')
                </div>
            @endforeach
        </div>
    @endif
@endsection