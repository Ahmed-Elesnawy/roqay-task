<tr>
    <td>{{ $role->id }}</td>
    <td>{{ $role->name }}</td>
    <td>
        @foreach ($role->permissions as $premission)
            <span class="badge badge-primary">{{ $premission->name }}</span>
        @endforeach
    </td>

    
    <td>

        @if (authAdmin()->can('update-role'))

            <a href="{{ route('dashboard.roles.edit', $role->id) }}" class="btn btn-warning text-white">
                Edit
            </a>


        @endif


        @if (authAdmin()->can('delete-role'))


            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-role-{{ $role->id }}">
                Delete
            </button>


        @endif

    </td>
</tr>



@if (authAdmin()->can('delete-role'))

    <!-- Modal -->

    @include('dashboard.roles.modals.delete-role')

@endif
