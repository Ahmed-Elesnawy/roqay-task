<tr id="category-{{ $category->id }}">
    <td>{{ $category->id }}</td>
    <td id="category-name-td-{{ $category->id }}">{{ $category->name }}</td>
    <td id="category-slug-td-{{ $category->id }}">
        {{ $category->slug }}
    </td>


    <td>

        @if (authAdmin()->can('update-category'))

            <button type="button" class="btn btn-warning" data-toggle="modal"
                data-target="#edit-category-{{ $category->id }}">
                Edit
            </button>

        @endif


        @if (authAdmin()->can('delete-category'))


            <button type="button" class="btn btn-danger" data-toggle="modal"
                data-target="#delete-category-{{ $category->id }}">
                Delete
            </button>

        @endif


    </td>
</tr>



<!-- Modal -->


@include('dashboard.categories.modals.edit-category')
@include('dashboard.categories.modals.delete-category')
