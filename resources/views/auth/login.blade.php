<x-layout page="{{$page}}">
    <x-slot:title>Вход</x-slot:title>
    <div class="container d-flex flex-column align-items-center">
        <h3 class="h3 mt-5">Войти</h3>
        <form class="mt-3 w-25" action="{{route('auth.login')}}" method="post" novalidate>
            @csrf
            <div class="row mb-3 justify-content-between">
                <label for="inputEmail" class="col col-form-label">Email</label>
                <div class="col-8">
                    <input class="form-control {{$errors->has('email')? 'is-invalid': ''}}" id="inputEmail" type="text" name="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 justify-content-between">
                <label for="inputPassword" class="col col-form-label">Password</label>
                <div class="col-8">
                    <input class="form-control {{$errors->has('password')? 'is-invalid': ''}}" id="inputPassword" type="password" name="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary col-md-12">Войти</button>
            </div>
        </form>
    </div>
</x-layout>
