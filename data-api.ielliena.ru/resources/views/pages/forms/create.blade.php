@extends("layouts.main")

@section("title")
    Создание новой формы - Forms
@endsection

@section("content")
    <main>
        <div class="container">
            <h2 class="mb-3">Создание новой формы</h2>
            <hr>
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="formNameInput" class="form-label">Название формы</label>
                    <input type="text" class="form-control" id="formNameInput" placeholder="Название формы">
                    <input type="hidden" value="0" id="fieldsCount">
                </div>
                <div id="fieldsContainer"></div>
                <div class="mb-3 mt-3 col-12">
                    <button type="button" class="btn btn-dark col-2" onclick="createForm()">Сохранить</button>
                    <button type="button" class="btn btn-secondary col-2" onclick="addField('input')">Добавить input</button>
                    <button type="button" class="btn btn-secondary col-2" onclick="addField('textarea')">Добавить textarea</button>
                    <button type="button" class="btn btn-secondary col-2" onclick="addField('select')">Добавить select</button>
                </div>
            </div>
        </div>
    </main>
@endsection
