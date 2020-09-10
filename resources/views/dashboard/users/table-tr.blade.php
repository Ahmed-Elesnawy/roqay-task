<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>
        {{ $user->email }}
    </td>
    <td>
        @if ($user->address)
            @foreach ($user->address as $key => $address)

                <div>{{ $key + 1 }}. {{ $address }}</div>
                <hr />

            @endforeach
        @endif
    </td>

    <td>
        @if (authAdmin()->can('update-user'))

            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-warning text-white">
                Edit
            </a>

        @endif


        @if (authAdmin()->can('delete-user'))

            <form method="post" action="{{ route('dashboard.users.destroy', $user->id) }}" class="d-inline-block">
                @method("Delete")
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

        @endif
    </td>
</tr>
