<tr>

    <td class="product-name">
        <h2 class="h5 text-black">{{ $item->name }}</h2>
    </td>
    <td>${{ $item->price }}</td>
    <td>
        <div class="input-group mb-3" style="max-width: 120px;">
            <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
            </div>
            <input type="text" class="form-control text-center" value="{{ $item->quantity }}" placeholder=""
                aria-label="Example text with button addon" aria-describedby="button-addon1">
            <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
            </div>
        </div>

    </td>
    <td>${{ $item->price * $item->quantity }}</td>
    <td>
        <form method="POST" action="{{ route('cart.clear-item',$item->id) }}">
            @csrf
            <button class="btn btn-danger btn-sm">X</button>
        </form>
    </td>
</tr>
