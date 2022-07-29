@foreach($data as $item)
    <div class="card p-2 col-4">
        @foreach($item->formData() as $value)
            <p><b>{{$value->name}}:</b> {{$value->value}}</p>
        @endforeach
    </div>
@endforeach
