{{-- Nombre del rol --}}
<div class="form-group">
    {!! Form::label('name', 'Role name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter role name...']) !!}
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

{{-- Listado de permisos --}}
<h2 class="h3">Permissions</h2>
@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
            {{ $permission->description }}
        </label>
    </div>
@endforeach
