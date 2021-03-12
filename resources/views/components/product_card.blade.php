<div class="card">
    <div id="carousel{{ $product->id }}" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            @foreach ($product->images as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="card-img-top" src="{{ asset($image->path) }}" style="object-fit: cover; height: 250px;">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carousel{{ $product->id }}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>

        <a class="carousel-control-next" href="#carousel{{ $product->id }}" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
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