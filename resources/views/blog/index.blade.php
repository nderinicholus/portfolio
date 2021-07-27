<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Blog Articles') }}
        </h2>
    </x-slot>
    <div class="py-6 mx-auto max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6">

            @if(($posts->count()) > 1)
                @foreach ($posts as $post)
                <li>{{ $post->title }}</li>
                @endforeach
                @else
                <p class="text-gray-800">
                    No Posts at the moment
                </p>
            @endif
        </div>
        
    </div>
</x-app-layout>