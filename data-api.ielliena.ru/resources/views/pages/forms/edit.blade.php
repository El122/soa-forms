@extends("layouts.main")

@section("title")
    Редактировать форму {{$form->name}} - Forms
@endsection


@section("content")
    <main>
        <div class="container">
            <h2 class="mb-3">Редактировать форму {{$form->name}}</h2>
            <hr>
            <div>
                <div class="mb-3 col-12">
                    <label for="formNameInput" class="form-label">Название формы</label>
                    <input type="text" class="form-control" id="formNameInput" placeholder="Название формы" value="{{$form->name}}">
                    <input type="hidden" value="{{$form->id}}" id="formId">
                    <input type="hidden" value="{{count($fields)}}" id="fieldsCount">
                </div>
                <div id="fieldsContainer">
                    @foreach($fields as $field)
                        @switch($field->type)
                            @case("input")
                                @include("components.editFields.input", ["data" => $field])
                                @break
                            @case("select")
                                @include("components.editFields.select", ["data" => $field])
                                @break
                            @case("textarea")
                                @include("components.editFields.textarea", ["data" => $field])
                                @break
                        @endswitch
                    @endforeach
                </div>
                <div class="mb-3 mt-3 col-12">
                    <button type="button" class="btn btn-dark col-2" onclick="updateForm()">Сохранить</button>
                    <button type="button" class="btn btn-secondary col-2" onclick="addField('input')">Добавить input</button>
                    <button type="button" class="btn btn-secondary col-2" onclick="addField('textarea')">Добавить textarea</button>
                    <button type="button" class="btn btn-secondary col-2" onclick="addField('select')">Добавить select</button>
                </div>
            </div>
        </div>
        <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true" id="updateMessage">
            <div class="d-flex">
                <div class="toast-body" id="updateMessage-text"></div>
            </div>
        </div>
    </main>

    <script !src="">
        localStorage.clear();
    </script>
@endsection
