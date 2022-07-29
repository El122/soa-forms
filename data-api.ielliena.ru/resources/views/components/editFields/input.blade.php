<div class="pt-3 pb-3" id="field-container-{{$data->id}}">
    <hr>
    <div class="row">
        <input type="hidden" class="field-id" value="{{$data->id}}">
        <input type="hidden" value="input" id="field-{{$data->id}}">
        <div class="mb-3 col-3">
            <label class="form-label w-100">Название поля
                <input type="text" class="form-control" placeholder="Название" value="{{$data->name}}" required id="field-name-{{$data->id}}">
            </label>
        </div>
        <div class="mb-3 col-3">
            <label class="form-label w-100">Тип поля
                <select class="form-select" id="field-type-{{$data->id}}">
                    <option value="text">Текст</option>
                    <option value="tel">Телефон</option>
                    <option value="number">Число</option>
                    <option value="email">E-mail</option>
                    <option value="radio">Радио-кнопка</option>
                    <option value="checkbox">Чекбокс</option>
                </select>
            </label>
        </div>
        <div class="mb-3 col-6">
            <label class="form-label w-100">Описание
                <input type="text" class="form-control" placeholder="Описание" value="{{$data->description}}" required id="field-description-{{$data->id}}">
            </label>
        </div>
        <div class="mb-3 col">
            <button class="btn btn-danger float-end" onclick="addToDeleteQueue('{{$data->id}}')">Удалить</button>
        </div>
    </div>
</div>
