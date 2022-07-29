<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Данные с формы</title>
    <style>
        header {
            padding: 10px 20px;
            background-color: antiquewhite;
            margin-bottom: 30px;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            margin: auto;
        }

        .card {
            border: 1px solid black;
            margin: 20px 0;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Сайт с формой</h1>
        <a href="{{route('index')}}">Вернуться к форме</a>
    </header>
    <div class="container">
        @if(isset($message))
            {{$message}}
        @else
            {!! $page !!}
        @endif
    </div>
</body>
</html>
