@extends("layouts.main")

@section("title")
    Данные с формы {{$formName}} - Forms
@endsection

@section("content")
    <main>
        <div class="container">
            <h2 class="mb-3">{{$formName}}</h2>
            <div class="row">
            @foreach($data as $item)
                <div class="card p-2 col-4">
                @foreach($item->formData() as $value)
                        <p><b>{{$value->name}}:</b> {{$value->value}}</p>
                @endforeach
                </div>
            @endforeach
            </div>
        </div>
    </main>
@endsection
