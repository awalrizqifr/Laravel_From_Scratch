@extends('layouts.app')

@section('content')
    <h1>Payment Details</h1>

    <h2 class="text-center font-weight-bold">Grand Total: ${{ $order->total }}</h2>

    <div class="text-center mb-3">
        <form
            method="POST"
            action="{{ route('orders.payments.store', ['order' => $order->id]) }}"
        >
            @csrf
            <button class="btn btn-success" type="submit">Pay</button>
        </form>
    </div>
@endsection
