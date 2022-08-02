<x-app-layout>

    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8">

        <div class="my-5">
            <h1 class="text-gray-800 text-2xl uppercase text-center font-bold">Posts about
                <span class="text-black italic">#{{ $tag->name }}</span>
            </h1>
        </div>

        @foreach ($posts as $post)
            <x-card-post :post="$post" />
        @endforeach

        <div class="my-5">
            {{ $posts->links() }}
        </div>

    </div>

</x-app-layout>
