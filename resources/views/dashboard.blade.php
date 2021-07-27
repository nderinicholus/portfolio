<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Hello {{ Auth::user()->name }},  You're logged in!
                </div>
            </div>
        </div>
        
    </div>

    <div class="container py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="p-6">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-3 border-b-2 border-gray-100">
                    Latest articles
                </h2>
                    <p class="leading-relaxed text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam repellat provident impedit error blanditiis eius beatae ducimus ipsum atque quos consequatur magni quaerat libero est ipsam commodi, consectetur temporibus perferendis!
                    </p>
                    <a href="#" class="text-indigo-500">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
