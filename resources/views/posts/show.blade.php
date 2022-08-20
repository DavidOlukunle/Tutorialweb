<x-layout>
    @include('partials._search')
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src= "{{$post->logo ? asset('storage/' .$post->logo) : asset('/images/download.jpg')}}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$post->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$post->name}}</div>
                

                <x-post-tag :tagsCsv="$post->tags" />
                


                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i>{{$post->location}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                       {{$post->description}}

                        <a
                            href="mailto:test@test.com"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                        >

                        <a
                            href="https://test.com"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit
                            Website</a
                        >
                    </div>
                </div>
            </div>
        {{-- </div>
    <div class="mt-4 p-2 flex space-x-6">
            <a href="/posts/{{$post->id}}/edit"><i class="fa-solid fa-pencil"></i>Edit</a>
   

    <form action="/posts/{{$post->id}}" method="Post">
        @csrf
        @method('DELETE')

        <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>



    </form> --}}
    </div>
    </div>
</x-layout>


