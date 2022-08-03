<div class="card">

    {{-- BUSCADOR --}}
    <div class="card-header form-row">
            <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Filter your search here..." wire:model="search">
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('admin.posts.create') }}">Create new post</a>
            </div>
    </div>

    @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="text-center">Status</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            @if ($post->status == 1)
                                <td class="text-secondary text-center">Draft copy</td>
                            @else
                                <td class="text-success text-center">Published</td>
                            @endif
                            <td width="10px">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- PAGINACIÓN --}}
        @if ($posts->hasPages())
            <div class="card-footer">
                {{ $posts->links() }}
            </div>
        @endif
    @else
        <div class="card-body text-center">
            <span class="font-bold">There are no records matching your search! Please try again with other terms...</span>
        </div>
    @endif
</div>
