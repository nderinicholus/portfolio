<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-medium text-gray-900 title-font px-4">
            {{ __('Edit a category') }}
        </h2>
    </x-slot>

    <section class="bg-white">
        <div class="container px-5 pb-24 mx-auto flex flex-wrap justify-center">
            <div class="lg:w-6/12 md:w-1/2 md:pr-16 lg:pr-3 pr-0 w-full">

                <form action="{{ route('blog-categories.update', $category->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                
                <x-input
                    type="text"
                    class="border-gray-300 block w-full"
                    id="title"
                    name="title"
                    value="{{ $category->title }}" 
                    placeholder="Category Name"
                    required />
                
                <button class="bg-blue-800 text-white p-2 rounded mt-2 flex justify-center mx-auto">Update</button>
                </form>

            </div>
        </div>
    </section>
</x-app-layout>