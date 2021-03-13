@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>

    <h2 class="text-center font-weight-bold">Grand Total: ${{ $cart->total ?? 0 }}</h2>
    
    @if (!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">
            Your cart is empty
        </div>
    @else
        <a class="btn btn-primary mb-3" href="{{ route('orders.create') }}">
            Start Order
        </a>
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-lg-3 col-md-4">
                    @include('components.product_card')
                </div>
            @endforeach
        </div>
    @endif
@endsection