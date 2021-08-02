<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-medium text-gray-900 title-font px-4">
            {{ __('Blog Categories') }}
        </h2>
    </x-slot>

    <section class="container px-5 py-12 mx-auto">
        <div class="mb-12">
            <h2 class="text-2xl font-medium text-gray-900 title-font px-4">All Categories ({{ $categories->count() }})
            </h2>
            <div class="my-6">
                <div class="flex flex-wrap md:flex-nowrap">

                    
                    
                    <div class="lg:w-9/12 md:w-1/2 md:pr-16 lg:pr-3 pr-0 w-full">
                        @if (Session::has('success'))
                            <div class="bg-green-200 p-6 mb-3">
                                {{ Session::get('success') }}
                            </div>
                        @endif


                        @if(($categories->count()) > 0)
                        @foreach ($categories as $category)
                        <div class="py-6 px-4 flex flex-wrap md:flex-nowrap bg-white border-b hover:bg-yellow-100">
                            <div class="pr-2 font-bold">
                                {{ $loop->iteration }}.
                            </div>
                        
                            <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                            <a href="{{ route('blog-categories.edit', $category->id) }}" class="items-start hover:text-blue-500">{{ $category->title }}</a>
                            </div>

                            <form action="{{ route('blog-categories.destroy', $category->id) }}" method="POST" class="md:flex-grow flex justify-end">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }} 

                            <span>
                                <input type="submit" value="Delete" class="bg-red-600 p-1 rounded text-white text-sm" onclick="return confirm('Are you sure?')">
                            </span>

                            </form>

                        </div>

                        


                        @endforeach
                        @else
                        <p class="text-gray-800 bg-white pl-4 py-3">
                            No Categories at the moment
                        </p>
                        @endif
                    </div>
                    
                    <div class="lg:w-3/12 md:w-1/2 flex flex-col md:ml-auto mt-10 md:mt-0 w-full">
                        <h2 class="font-semibold text-xl text-blue-800 pb-2">Add Category</h2>
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
                        
                        <button class="bg-blue-800 text-white p-2 rounded mt-2 shadow w-full hover:bg-yellow-200 hover:text-gray-900 text-sm">Save </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>