{{-- Nombre --}}
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter post name...']) !!}
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

{{-- Slug --}}
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'readOnly']) !!}
    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

{{-- Categoría --}}
<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', $categories, 'null', ['class' => 'form-control']) !!}
    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

{{-- Etiquetas --}}
<div class="form-group">
    <p class="font-weight-bold">Tags</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{ $tag->name }}
        </label>
    @endforeach
    @error('tags')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

{{-- Imagen --}}
{!! Form::label('image', 'Image') !!}
<div class="row mb-3">
    <div class="col">
        <div class="form-group">
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <small class="justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea in excepturi pariatur? Rem debitis voluptas sapiente esse ipsam. Nesciunt suscipit tempore autem maxime facere labore asperiores ab repellendus sunt quod.</small>
    </div>

    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image)
                <img id="picture" class="img-thumbnail" src="{{ asset('storage/'.$post->image->url) }}" alt="Imagen del post">
            @else
                <img id="picture" class="img-thumbnail" src="https://cdn.pixabay.com/photo/2022/06/02/11/12/felucca-7237715_960_720.jpg" alt="Imagen por defecto">
            @endisset
        </div>
    </div>
</div>

{{-- Extract --}}
<div class="form-group">
    {!! Form::label('extract', 'Extract') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control', 'rows' => '2', 'style' => 'resize:none', 'placeholder' => 'Enter post extract...']) !!}
    @error('extract')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

{{-- Body --}}
<div class="form-group">
    {!! Form::label('body', 'Content') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'style' => 'resize:none', 'placeholder' => 'Enter post content...']) !!}
    @error('body')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

{{-- Estado --}}
<div class="form-group">
    <p class="font-weight-bold">Status</p>
    <label>
        {!! Form::radio('status', 1, true, ['class' => 'mr-2']) !!} <span class="mr-2">Draft release</span>
        {!! Form::radio('status', 2, false) !!} <span>Published</span>
    </label>
</div>
