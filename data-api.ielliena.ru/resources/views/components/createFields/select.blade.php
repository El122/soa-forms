<div class="pt-3 pb-3" id="field-container-{{$count}}">
    <hr>
    <div class="row">
        <input type="hidden" value="select" id="field-{{$count}}">
        <div class="mb-3 col-6">
            <label class="form-label w-100">Описание (label/placeholder)
                <input type="text" class="form-control" placeholder="Описание" required id="field-description-{{$count}}">
            </label>
        </div>
        <div class="mb-3 col-6">
            <label class="form-label w-100">Название поля (name)
                <input type="text" class="form-control" placeholder="Название" required id="field-name-{{$count}}">
            </label>
        </div>
        <div class="col-12" id="option-container-{{$count}}">
            <input type="text" class="mb-3 form-control field-option-{{$count}}" placeholder="Опция" required>
        </div>
        <div class="mb-3 col">
            <button type="button" class="btn btn-secondary" onclick="addOption('{{$count}}')">Добавить еще одну опцию</button>
            <button class="btn btn-danger float-end" onclick="deleteField('{{$count}}')">Удалить</button>
        </div>
    </div>
</div>
