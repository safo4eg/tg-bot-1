<x-layout page="{{$page}}">
    <x-slot:title>Посты</x-slot:title>
    <div class="container d-flex flex-column align-items-center pt-5">
        <h3 class="h3 mb-5">Все посты</h3>
        @if(isset($posts[0]))
            <table class="table">
                <thead>
                <tr class="row justify-content-center">
                    <th class="col-1" scope="col">№</th>
                    <th class="col-2" scope="col">title</th>
                    <th class="col-3" scope="col">description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr class="row justify-content-center   ">
                        <th class="col-1" scope="row">{{$post->id}}</th>
                        <td class="col-2">
                            <a href="{{route('posts.show', ['post' => $post->id])}}">{{$post->title}}</a>
                        </td>
                        <td class="col-3">
                            <div class="d-inline-block text-truncate" style="max-width: 150px;">
                                {{$post->description}}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div>Вы еще не публиковали посты</div>
        @endif
    </div>
</x-layout>
