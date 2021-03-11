@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </thead>
            <tbody>
                @foreach ($cart->products as $product)
                    <tr>
                        <td>
                            <img class="card-img-top" src="{{ asset($product->images->first()->path) }}" style="object-fit: cover; height: 250px; width: 250px;">
                            {{ $product->title }}
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->price * $product->pivot->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
