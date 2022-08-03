@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit tag</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {{-- FORMULARIO --}}
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'PUT']) !!}

                {{-- Nombre --}}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter tag name...']) !!}

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

                {{-- Color --}}
                <div class="form-group">
                    {!! Form::label('color', 'Color') !!}
                    {!! Form::select('color', [null => 'Select color...'] + $colors,
                    null, ['class' => 'form-control']) !!}

                    @error('color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Botón --}}
                {!! Form::submit('Save changes', ['class' => 'btn btn-primary float-right']) !!}

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
