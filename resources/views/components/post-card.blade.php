@props(['post'])

<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src= "{{$post->logo ? asset('storage/' .$post->logo) : asset('/images/download.jpg')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/posts/{{$post->id}}">{{$post->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$post->name}}</div>
            <x-post-tag :tagsCsv="$post->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$post->location}}
            </div>
        </div>
    </div>
    </div>
