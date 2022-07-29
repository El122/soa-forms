@extends("layouts.main")

@section("title")
    Авторизация - Forms
@endsection

@section("content")
<main>
    <div class="container">
        <h2>Вход/авторизация</h2>
        <form method="POST" action="{{route('login')}}" c>
            @csrf
            <div class="mb-3">
                <label for="emailField" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailField" name="email" required>
            </div>
            <div class="mb-3">
                <label for="paswordField" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="paswordField" name="password" required>
            </div>
            @if(isset($message))
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @endif
            <button class="btn btn-primary">Войти/зарегистрироваться</button>
        </form>
    </div>
</main>
@endsection
