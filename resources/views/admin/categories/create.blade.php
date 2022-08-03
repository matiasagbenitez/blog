@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create new category</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {{-- FORMULARIO --}}
            {!! Form::open(['route' => 'admin.categories.store']) !!}

                {{-- Nombre --}}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter category name...']) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Slug --}}
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'readOnly']) !!}

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Botón --}}
                {!! Form::submit('Create category', ['class' => 'btn btn-primary float-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/string-to-slug/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
