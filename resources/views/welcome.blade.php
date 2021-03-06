@extends('layouts.app')

@section('content')
    @empty ($products)
        <div class="alert alert-warning">
            The list of products is empty
        </div>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4">
                    @include('components.product_card')
                </div>
            @endforeach
        </div>
    @endif
@endsection