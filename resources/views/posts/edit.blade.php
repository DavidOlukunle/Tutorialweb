<x-layout>
<main>
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit Gig
                </h2>
                <p class="mb-4">Edit: {{$post->title}}</p>
            </header>

            <form method="POST" action="/posts/{{$post->id}}"enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="company"
                        class="inline-block text-lg mb-2"
                        >Tutorial Name</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="title"
                        value="{{$post->title}}"
                        />
                        @error('Tutorialname')

                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>


                    @enderror
                    
                </div>

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2"
                        >Your Name</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                        placeholder="Example: Senior Laravel Developer"
                        value="{{$post->name}}"
                    />
                    @error('name')

                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>


                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="location"
                        class="inline-block text-lg mb-2"
                        >Tutorial Location</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="location"
                        placeholder="Example: Remote, Boston MA, etc"
                        value="Boston, MA"
                    />
                    @error('location')

                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>


                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2"
                        >Contact Email</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="email"
                        value="{{$post->email}}"
                    />
                </div>

                {{-- <div class="mb-6">
                    <label
                        for="website"
                        class="inline-block text-lg mb-2"
                    >
                        Website/Application URL
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="website"
                        value="https://acmecorp.com"
                    />
                </div> --}}

                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Tags (Comma Separated)
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="tags"
                        placeholder="Example: Laravel, Backend, Postgres, etc"
                        value="{{$post->tags}}"
                    />
                    @error('tags')

                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>


                    @enderror
                </div>

                <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">
                        Company Logo
                    </label>
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="logo"/>
                        <img
                        class="w-48 mr-6 mb-6"
                        src= "{{$post->logo ? asset('storage/' .$post->logo) : asset('/images/download.jpg')}}"
                        alt=""
                    />

                </div>

                <div class="mb-6">
                    <label
                        for="description"
                        class="inline-block text-lg mb-2"
                    >
                        Job Description
                    </label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="description"
                        rows="10"
                        placeholder="Include tasks, requirements, salary, etc"
                    >
{{$post->description}}
                </textarea>
                @error('description')

                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>


                    @enderror
                    
                </div>

                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black text-lg"
                    >
                       Update Post
                    </button>

                    <a href="dashboard.html" class="text-black ml-4">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>

<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
>
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    <a
        href="create.html"
        class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
        >Post Job</a
    >
</x-layout>