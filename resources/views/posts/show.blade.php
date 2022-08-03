<x-app-layout>

    <div class="container py-5">

        {{-- TITULO --}}
        <h1 class="text-3xl font-bold text-gray-800">{{ $post->name }}</h1>

        {{-- EXTRACTO --}}
        <div class="text-base mb-4">
            {{ $post->extract }}
        </div>

        {{-- CONTENIDO --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- PRINCIPAL --}}
            <div class="lg:col-span-2">
                <figure>
                    <img class="w-full rounded-lg" src="@if($post->image) {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2019/11/11/04/33/elephant-4617134_960_720.jpg @endif" alt="Imagen del post">
                </figure>
                <div class="text-base my-4 text-justify">
                    {{ $post->body }}
                </div>
                <p class="text-sm text-gray-500">Published {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</p>
            </div>

            {{-- RELACIONADO --}}
            <aside>
                <h1 class="text-xl font-bold text-gray-600 mb-4">More posts about <span class="text-black">{{ $post->category->name }}</span></h1>

                {{-- POSTS SIMILARES --}}
                <ul>
                    @foreach ($relateds as $related)
                        <li class="mb-4">
                            <a href="{{ route('posts.show', $related )}}" class="grid grid-cols-3">
                                <img class="w-36 h-20 object-cover col-span-1 rounded-lg" src="@if($related->image) {{ Storage::url($related->image->url) }} @else https://cdn.pixabay.com/photo/2019/11/11/04/33/elephant-4617134_960_720.jpg @endif" alt="Imagen del post">
                                <span class="ml-2 text-gray-600 col-span-2">{{ $related->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>

    </div>

</x-app-layout>
