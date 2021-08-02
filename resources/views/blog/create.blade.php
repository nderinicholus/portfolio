<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create a post') }}
        </h2>
    </x-slot>    

    <section class="bg-white">

        <div class="container px-5 pb-24 mx-auto flex flex-wrap items-start">
                <div class="lg:w-9/12 md:w-1/2 md:pr-16 lg:pr-3 pr-0 w-full">
                    <form 
                        action="{{ route('blog.store') }}" 
                        method="POST"
                        class="p-1"
                    >
                    @csrf
                        <x-input
                        class="border-gray-300 block my-2 w-full"
                        type="text"
                        id="title"
                        name="title"
                        placeholder="Enter post title"
                        :value="old('title')"
                        required />
        
                        <textarea id="textarea" class="border-gray-300 block mt-3 w-full rounded-md focus:border-indigo-300 shadow-sm" name="content" id="content" rows="10" placeholder="Enter post content">{{ old('content') }}</textarea>
                        <button class="bg-blue-800 text-white p-2 rounded mt-2 shadow hover:bg-yellow-200 hover:text-gray-900">Save Post</button>
                    
                </div>
    
                <div class="lg:w-3/12 md:w-1/2 flex flex-col md:ml-auto mt-10 md:mt-0 w-full">
                    <h2 class="font-semibold text-xl text-blue-800">Blog Categories</h2>
                    <select name="blogcategory_id" id="blogcategory_id" class="mt-2 rounded border-gray-300">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == old('blogcategory_id')) selected @endif> {{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

            </form>
                
            </div>


    </section>

    @section('scripts')
    @include('layouts.ckeditor')
    @endsection
    

</x-app-layout>