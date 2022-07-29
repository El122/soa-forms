<div class="pt-3 pb-3" id="field-container-{{$data->id}}">
    <hr>
    <div class="row">
        <input type="hidden" class="field-id" value="{{$data->id}}">
        <input type="hidden" value="textarea" id="field-{{$data->id}}">
        <div class="mb-3 col-3">
            <label class="form-label w-100">Название поля
                <input type="text" class="form-control" placeholder="Название" value="{{$data->name}}" required id="field-name-{{$data->id}}">
            </label>
        </div>
        <div class="mb-3 col-9">
            <label class="form-label w-100">Описание
                <input type="text" class="form-control" placeholder="Описание" value="{{$data->description}}"  id="field-description-{{$data->id}}">
            </label>
        </div>
        <div class="mb-3 col">
            <button class="btn btn-danger float-end" onclick="addToDeleteQueue('{{$data->id}}')">Удалить</button>
        </div>
    </div>
</div>
