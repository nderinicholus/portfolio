<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-medium text-gray-900 title-font px-4">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <section class="container px-5 py-12 mx-auto">
        <div class="mb-12">
            <h2 class="text-2xl font-medium text-gray-900 title-font px-4">All Categories {{ $categories->count() }}
            </h2>
            <div class="my-6">
                <div class="flex flex-wrap md:flex-nowrap">
                    <div class="content w-full md:w-3/4 leading-relaxed text-base">
                        @if(($categories->count()) > 0)
                        @foreach ($categories as $category)
                        <a href="" class="py-6 px-4 flex flex-wrap md:flex-nowrap bg-white border-b hover:bg-yellow-200">{{ $category->title }}</a>
                        @endforeach
                        @else
                        <p class="text-gray-800 bg-white pl-4 py-3">
                            No Categories at the moment
                        </p>
                        @endif
                    </div>
                    
                    <div class="w-full md:w-1/4 md:pl-4 py-3 items-start">
                        <form 
                            action="" 
                            method="POST"
                        >

                        @csrf
                        <x-input
                        type="text"
                        class="border-gray-300 block w-full"
                        id="title"
                        name="title"
                        placeholder="Category name"
                        :value="old('title')"
                        required />
                        <button class="bg-blue-800 text-white p-2 rounded mt-2 shadow w-full">Save </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>