@extends("layouts.main")

@section("title")
    Управление формами - Forms
@endsection

@section("content")
    <main>
        <div class="container">
            <h2 class="mb-3">Управление формами</h2>
            <hr>
            @if(count($forms))
            <div class="row">
                @foreach($forms as $form)
                <div class="card mb-2 p-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-text">
                            <h5 class="card-title">{{$form->name}}</h5>
                            <p><b>form_uid: </b>{{$form->form_uid}}</p>
                        </div>
                        <div class="card-menu">
                            <a href="{{route('form.data', ["id" => $form->id])}}" class="menu-link">
                                <img src="{{asset("assets/img/icons/view.png")}}" alt="Просмотреть записи">
                            </a>
                            <a href="{{route('form.show', ["id" => $form->id])}}" class="menu-link">
                                <img src="{{asset("assets/img/icons/open-menu.png")}}" alt="Просмотреть форму">
                            </a>
                            <a href="{{route('form.edit', ["id" => $form->id])}}" class="menu-link">
                                <img src="{{asset("assets/img/icons/setting.png")}}" alt="Редактировать форму">
                            </a>
                            <a href="{{route('form.remove', ["id" => $form->id])}}" class="menu-link">
                                <img src="{{asset("assets/img/icons/delete.png")}}" alt="Удалить форму">
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
                <p class="text-center p-5 text-secondary">У вас пока нет ни одной формы. <a class="nav-link text-primary" aria-current="page" href="{{route("form.create")}}"> Хотите создать новую форму?</a></p>
            @endif
        </div>
    </main>
@endsection
