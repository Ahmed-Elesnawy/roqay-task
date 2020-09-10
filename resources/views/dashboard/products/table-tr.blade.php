<tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->desc }}</td>
    <td>
        {{ $product->price }}
    </td>

    <td>
        {{ $product->category->name }}
    </td>


    <td>
        @if (authAdmin()->can('update-product'))

            <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-warning text-white">
                Edit
            </a>

        @endif


        @if (authAdmin()->can('delete-product'))


            <a href="{{ route('dashboard.products.destroy', $product->id) }}"
                class="btn btn-danger text-white product-delete">
                Delete
            </a>

        @endif
    </td>
</tr>
