@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asign role to user</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            <p class="h5">Name</p>
            <p class="form-control">{{ $user->name }}</p>
            <p class="h5">Roles</p>

            {{-- Formulario --}}
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-2']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach
                {!! Form::submit('Asign role', ['class' => 'btn btn-success mt-2 float-right']) !!}
            {!! Form::close() !!}

        </div>
    </div>

@stop
