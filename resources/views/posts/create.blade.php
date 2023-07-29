<x-layout page="{{$page}}">
    <x-slot:title>Добавить пост</x-slot:title>
    <div class="container d-flex flex-column align-items-center pt-5">
        <h3 class="h3 mb-5">Добавить пост</h3>
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <div class="row mb-2">
                <label class="col col-form-label" for="inputTitle">Title</label>
                <div class="col-8">
                    <input
                        class="form-control {{$errors->has('title')? 'is-invalid': (!empty(old('title'))? 'is-valid': '')}}"
                        id="inputTitle"
                        type="text"
                        name="title"
                        value="{{old('title')}}"
                    >
                    @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col col-form-label" for="textareaDescription">Описание</label>
                <div class="col-8">
                    <textarea
                        class="form-control {{$errors->has('description')? 'is-invalid': (!empty(old('description'))? 'is-valid': '')}}"
                        style="resize: none;"
                        id="textareaDescription"
                        name="description"
                    >{{old('description')}}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <button class="btn btn-primary" type="submit">Добавить</button>
            </div>
        </form>
    </div>
</x-layout>
