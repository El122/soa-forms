@extends("layouts.main")

@section("title")
    Форма {{$form->name}} - Forms
@endsection

@section("content")
    <main>
        <div class="container">
            <h2 class="mb-3">{{$form->name}}</h2>
            <hr>
            <div class="row">
               @include("pages.api.form")
            </div>
        </div>
    </main>
@endsection
