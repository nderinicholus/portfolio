<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('blog.index') }}" class="hover:text-blue-500">{{ __('Posts') }}</a> > {{ $post->title }}
        </h2>
    </x-slot>

    <section class="bg-white">
        <div class="container px-5 py-24 border-t">
            <div class="mb-12">
                <h2 class="font-medium text-2xl text-gray-900 title-font">
                    {{ $post->title }}
                    
                </h2>

                <div class="py-2 border-b text-sm flex items-center">
                    <div class="text-gray-500">
                        Category: {{ $post->blog_category->title }}
                    </div>
                    
                    <div class="md:flex-grow flex justify-end space-x-4">
                        <a href="{{ route('blog.edit', $post->id) }}" class="bg-blue-800 text-white p-1 rounded text-sm">Edit</a>
                    </div>
                </div>
            </div>
            <div class="my-6">
                <div class="flex flex-wrap">
                    <p class="content w-full md:3/4 text-gray-800">
                        {!! $post->content !!}
                    </p>
                </div>
            </div>


        </div>
    </section>
</x-app-layout>