<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create a Blog Post') }}
        </h2>
    </x-slot>    

    <section class="bg-white p-6">

        <div class="container px-5 py-24 mx-auto flex flex-wrap items-start">
                <div class="lg:w-9/12 md:w-1/2 md:pr-16 lg:pr-3 pr-0 w-full">
                    <form 
                        action="#" 
                        method="POST"
                        class="p-1"
                    >
                        <x-input
                        class="border-gray-300 block mt-1 w-full"
                        type="text"
                        id="title"
                        name="title"
                        :value="old('title')"
                        required />
        
                        <textarea 
                        class="border-gray-300 block mt-1 w-full rounded-md focus:border-indigo-300 shadow-sm"
                        name="content" 
                        id="content" 
                        rows="10">
                        </textarea>
                    </form>
                </div>
    
                <div class="lg:w-3/12 md:w-1/2 flex flex-col md:ml-auto mt-10 md:mt-0">
                    <h2 class="font-semibold text-xl text-gray-800">Blog Categories</h2>
                </div>
                
            </div>


    </section>

</x-app-layout>