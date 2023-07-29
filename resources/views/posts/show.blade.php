<x-layout>
    <x-slot:title>Пост {{$post->id}}</x-slot:title>
    <div class="container mt-3
    ">
        <div class="d-flex flex-column align-items-center">
            <h3 class="h3">Post #{{$post->id}}</h3>
                <div>Title: {{$post->title}}</div>
                <p>Description: {{$post->description}}</p>
        </div>
    </div>
</x-layout>
