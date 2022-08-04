<div>
    <div class="card">

        {{-- BUSCADOR --}}
        <div class="card-header">
            <input type="text" class="form-control" placeholder="Filtre su búsqueda aquí..." wire:model="search">
        </div>

        {{-- SI HAY RESULTADOS DE BUSQUEDA --}}
        @if ($users->count())
            {{-- TABLA --}}
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email}}</td>
                                <td width="10px">
                                    <a href="{{ route('admin.users.edit', $user)}}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- PAGINACIÓN --}}
            @if ($users->hasPages())
                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            @endif
        @else
            <div class="card-body text-center">
                <strong class="font-bold">There are no records matching your search! Please try again with other terms...</strong>
            </div>
        @endif

    </div>
</div>
