<tr>
    <td>{{ $admin->id }}</td>
    <td>{{ $admin->name }}</td>
    <td>{{ $admin->email }}</td>

    <td>
        @foreach ($admin->getRoleNames() as $name)
            <span class="badge badge-success">{{ $name }}</span>
        @endforeach
    </td>

    <td>

        @if (authAdmin()->can('edit-admin'))

            <a href="{{ route('dashboard.admins.edit', $admin->id) }}" class="btn btn-warning text-white">
                @lang('dashboard.edit')
            </a>
        @endif

        @if (authAdmin()->can('delete-admin'))

            <button type="button" class="btn btn-danger" data-toggle="modal"
                data-target="#delete-admin-{{ $admin->id }}">
                @lang('dashboard.delete')
            </button>
        @endif

    </td>
</tr>


<!-- Modal -->

@include('dashboard.admins.modals.delete-admin')
