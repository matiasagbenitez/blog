@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Category list</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">

        @can('admin.categories.create')
            <div class="card-header">
                <a class="btn btn-success" href="{{ route('admin.categories.create') }}">Create new category</a>
            </div>
        @endcan

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                @can('admin.categories.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.categories.delete')
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@stop
