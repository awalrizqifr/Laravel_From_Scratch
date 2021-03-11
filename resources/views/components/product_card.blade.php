<div class="card">
    <img class="card-img-top" src="{{ asset($product->images->first()->path) }}" style="object-fit: cover; height: 250px;">
    <div class="card-body">
        <h4 class="text-right font-weight-bold">${{ $product->price }}</h4>
        <h5 class="card-title font-weight-bold">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text font-weight-bold">{{ $product->stock }} left</p>
        @if (!isset($cart))
            <form
                method="POST"
                action="{{ route('products.carts.store', ['product' => $product->id]) }}"
            >
                @csrf
                <button class="btn btn-success" type="submit">Add to Cart</button>
            </form>
        @else
            <p class="card-text font-weight-bold">
                {{ $product->pivot->quantity }} in your cart
                (${{ $product->total }})
            </p>
            <form
                method="POST"
                action="{{ route('products.carts.destroy', ['product' => $product->id, 'cart' => $cart->id]) }}"
            >
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">Remove From Cart</button>
            </form>
        @endif
    </div>
</div>