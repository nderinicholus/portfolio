<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-medium text-gray-900 title-font px-4">
        {{ __('Blog Articles') }}
        </h2>
    </x-slot>

    <section class="container px-5 py-12 mx-auto">
        <div class="mb-12">
            <div class="my-6">
                @if(($posts->count()) > 0)
                @foreach ($posts as $post)
                <a href="" class="py-6 px-4 flex flex-wrap md:flex-nowrap bg-white">{{ $post->title }}</a>
                @endforeach
                @else
                <p class="text-gray-800">
                    No Posts at the moment
                </p>
            @endif
            </div>
        </div>
    </section>
    
</x-app-layout>