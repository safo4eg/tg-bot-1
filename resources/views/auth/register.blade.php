<x-layout page="{{$page}}">
    <x-slot:title>Регистрация</x-slot:title>
    <div class="container d-flex flex-column align-items-center">
        <h3 class="h3 mt-5">Регистрация</h3>
        <form class="mt-3 w-25" action="{{route('auth.register')}}" method="post">
            @csrf
            <div class="row mb-3 justify-content-between">
                <label class="col col-form-label" for="inputLogin">Login</label>
                <div class="col-8">
                    <input
                        class="form-control {{$errors->has('login')? 'is-invalid': (!empty(old('login'))? 'is-valid': '')}}"
                        id="inputLogin"
                        type="text"
                        name="login"
                        value="{{old('login')}}"
                    >
                    @error('login')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 justify-content-between">
                <label class="col col-form-label" for="inputEmail">Email</label>
                <div class="col-8">
                    <input
                        class="form-control {{$errors->has('email')? 'is-invalid': (!empty(old('email'))? 'is-valid': '')}}"
                        id="inputEmail"
                        type="text"
                        name="email"
                        value="{{old('email')}}"
                    >
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 justify-content-between">
                <label class="col col-form-label" for="inputPassword">Password</label>
                <div class="col-8">
                    <input class="form-control {{$errors->has('password')? 'is-invalid': ''}}" id="inputPassword" type="password" name="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 justify-content-between">
                <label class="col col-form-label" for="inputPasswordConfirmation">Confirm password</label>
                <div class="col-8">
                    <input class="form-control" id="inputPasswordConfirmation" type="password" name="password_confirmation">
                </div>
            </div>

            <div class="row justify-content-center">
                <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
            </div>
        </form>
    </div>
</x-layout>
