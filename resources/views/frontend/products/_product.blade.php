<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
    <div class="block-4 text-center border">
        <figure class="block-4-image">
            <a href="shop-single.html"><img src="{{ asset('frontend') }}/images/cloth_1.jpg" alt="Image placeholder"
                    class="img-fluid"></a>
        </figure>
        <div class="block-4-text p-4">
            <h3><a href="shop-single.html">{{ $product->name }}</a></h3>
            <p class="mb-0">{{ $product->category->name }}</p>
            <p class="text-primary font-weight-bold">${{ $product->price }}</p>

            @auth
                @if (Cart::session(authUser()->id)->get($product->id))
                    <h4 class="label-label-warning">Product Added!</h4>
                @else
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Add To Cart <span class="icon icon-shopping_cart"></span>
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</div>
