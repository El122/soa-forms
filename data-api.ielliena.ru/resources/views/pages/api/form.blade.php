<style>
    #data-api_form button {
        color: #fff;
        background-color: #0d6efd;
        border-color: #0d6efd;
        padding: 0.375rem 0.75rem;
        font-weight: 400;
        line-height: 1.5;
        border-radius: 0.375rem;
    }

    #data-api_form button:hover {
        background-color: #0b5ed7;
        border-color: #0a58ca;
    }

    #data-api_form button:focus {
        box-shadow: inset 0 3px 5px rgba(49,132,253);
    }

    #data-api_form button:active {
        background-color: #0a58ca;
        border-color: #0a53be;
    }

    #data-api_form button:disabled {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    #data-api_form input,  #data-api_form textarea,  #data-api_form select {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
    }

    #data-api_form label {
        display: block;
        width: 100%;
        margin-bottom: 20px;
    }
</style>

<form id="data-api_form">
    <input type="hidden" id="data-api_form-id" value="{{$form->id}}">
    @foreach($fields as $field)
        @switch($field->type)
            @case("input")
                @include("components.fields.input", ["data" => $field])
                @break
            @case("select")
                @include("components.fields.select", ["data" => $field])
                @break
            @case("textarea")
                @include("components.fields.textarea", ["data" => $field])
                @break
        @endswitch
    @endforeach
    <p id="data-api_result-message"></p>
    <button type="button" onclick="sendForm()">Отправить</button>
</form>

<script !src="">
    const sendForm = async() => {
        const fields = document.getElementsByClassName("data-api_form-field");
        const data = [];

        for(let i = 0; i < fields.length; ++i) {
            data.push({
                name: fields[i].getAttribute("name"),
                value: fields[i].value
            });
        }

        const result = await fetch("https://data-api.ielliena.ru/api/data", {
            method: "POST",
            body: JSON.stringify({
                "jsonrpc": "2.0",
                "method": "saveFormData",
                "id": "54645",
                "params": {
                    formId: document.getElementById("data-api_form-id").value,
                    data
                }
            }),
        }).then((res) => res.json());

        document.getElementById("data-api_result-message").innerText = result.result.message;
    }
</script>
