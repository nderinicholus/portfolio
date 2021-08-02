<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-medium text-gray-900 title-font px-4">
            {{ __('Blog Posts') }} ({{ $posts->count() }})
        </h2>
    </x-slot>

    <section class="container px-5 py-12 mx-auto">
        <div class="mb-12">
            <div class="my-6">
                <div class="lg:w-full md:w-1/2 md:pr-16 lg:pr-3 pr-0 w-full">
                    @if (Session::has('success'))
                    <div class="bg-green-200 p-6 mb-3">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="flex justify-end py-2">
                        <a href="{{ route('blog.create') }}"
                            class="bg-blue-800 text-white p-2 rounded hover:bg-yellow-200 hover:text-gray-900 shadow text-sm">Create
                            a Post</a>
                    </div>
                    @if(($posts->count()) > 0)
                    @foreach ($posts as $post)
                    <div class="py-6 px-4 flex flex-wrap md:flex-nowrap bg-white border-b hover:bg-yellow-100">

                        <div class="pr-2 font-bold">
                            {{ $loop->iteration }}.
                        </div>

                    <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                        <a href="{{ route('blog.show', $post->id) }}" class="hover:text-blue-500 ">{{ $post->title }}</a>
                    </div>
                        
                        <div class="md:flex-grow mr-8 flex items-center justify-start">
                            <a href="#" class="ml-2 inline-flex">{{ $post->blog_category->title }}</a>
                        </div>

                        <div class="md:flex-grow flex justify-end space-x-4">

                            <a href="{{ route('blog.edit', $post->id) }}"
                                class="bg-blue-800 text-white p-1 rounded text-sm">Edit</a>

                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <span>
                                    <input type="submit" value="Delete"
                                        class="bg-red-600 p-1 rounded text-white text-sm"
                                        onclick="return confirm('Are you sure?')">
                                </span>

                            </form>
                        </div>
                    </div>
                    @endforeach
                    @else

                    <div class="content w-full leading-relaxed text-base text-center">
                        <p class="text-gray-800 bg-blue-400 p-6 mb-3 rounded">
                            No Posts at the moment
                        </p>

                        <div class="">

                            <a href="{{ route('blog.create') }}"
                                class="bg-blue-800 text-white p-2 rounded hover:bg-yellow-200 hover:text-gray-900 shadow">Create
                                a Post</a>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </section>

</x-app-layout>