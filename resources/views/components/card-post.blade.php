@props(['post'])

<article class="mt-5 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-72 object-cover object-center"
        src="@if ($post->image) {{ Storage::url($post->image->url) }}  @else https://cdn.pixabay.com/photo/2019/11/11/04/33/elephant-4617134_960_720.jpg @endif"
        alt="Imagen">

    <div class="py-4 px-6">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {{ $post->extract }}
        </div>

        <div class="pt-2 pb-2">
            @foreach ($post->tags as $tag)
                <a href="{{ route('posts.tag', $tag) }}"
                    class="inline-block px-2 h-6 bg-gray-400 opacity-50 text-black text-sm rounded-full hover:opacity-100">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </div>
</article>
