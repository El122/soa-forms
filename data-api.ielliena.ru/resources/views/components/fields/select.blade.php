<label for="input_{{$data->id}}">
    {{$data->description}}
    <select class="form-control data-api_form-field" id="input_{{$data->id}}" name="{{$data->name}}">
        @foreach($data->options() as $option)
        <option>{{$option->option}}</option>
        @endforeach
    </select>
</label>

