<header class="mb-5">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route("form.index")}}">Forms</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="ml-a" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link {{Route::is('form.index') ? "active" : ""}}" href="{{route("form.index")}}">Управление формами</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::is('form.create') ? "active" : ""}}" aria-current="page" href="{{route("form.create")}}">Создать форму</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("logout")}}">Выйти</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
