@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit role</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) !!}

            @include('admin.roles.partials.form')
            {!! Form::submit('Save changes', ['class' => 'btn btn-success mt-2 float-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@stop
