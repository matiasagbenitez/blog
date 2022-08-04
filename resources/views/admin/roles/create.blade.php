@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create role</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.roles.store']) !!}

                @include('admin.roles.partials.form')
                {!! Form::submit('Create role', ['class' => 'btn btn-success mt-2 float-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>
@stop
