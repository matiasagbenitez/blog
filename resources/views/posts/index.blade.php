<x-app-layout>

    <div class="container py-5">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center rounded-lg @if($loop->first) md:col-span-2 @endif"
                    style="background-image: url(@if($post->image) {{ Storage::url($post->image->url) }} @else hhttps://cdn.pixabay.com/photo/2019/11/11/04/33/elephant-4617134_960_720.jpg @endif)">

                    {{-- CONTENT --}}
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        {{-- TAGS --}}
                        <div class="">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.tag', $tag) }}"  class="inline-block px-2 h-6 bg-gray-400 opacity-50 text-black text-sm rounded-full hover:opacity-100">
                                    #{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                        {{-- TITLE --}}
                        <h1 class="text-2xl text-gray-800 font-bold hover:text-gray-900">
                            <a href="{{ route('posts.show', $post) }}">
                                {{ $post->name }}
                            </a>
                        </h1>
                    </div>

                </article>
            @endforeach
        </div>

        <div class="mt-5">
            {{ $posts->links() }}
        </div>

    </div>

</x-app-layout>
