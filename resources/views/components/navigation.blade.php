<div class="navbar navbar-expand">
    <div class="container-fluid px-5">
        <a href="{{url('/')}}" class="navbar-brand">BOT</a>
        <ul class="navbar-nav">
            @if(auth()->user())
                @if(auth()->user()->isAdmin)
                    <li class="nav-item">
                        <a class="nav-link {{$attributes['page'] === 'posts.index'? 'active': ''}}" href="{{route('posts.index')}}">Все посты</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{$attributes['page'] === 'posts.index'? 'active': ''}}" href="{{route('posts.index')}}">Мои посты</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{$attributes['page'] === 'posts.create'? 'active': ''}}" href="{{route('posts.create')}}">Создать пост</a>
                    </li>
                @endif
                    <li class="nav-item">
                        <a href="{{route('auth.logout')}}" class="nav-link">Выход</a>
                    </li>
            @else
                <li class="nav-item">
                    <a href="{{route('auth.login')}}" class="nav-link {{$attributes['page'] === 'login'? 'active': ''}}">Вход</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('auth.register')}}" class="nav-link {{$attributes['page'] === 'register'? 'active': ''}}">Регистрация</a>
                </li>
            @endif


        </ul>
    </div>
</div>
