const sendRequest = async ({ path, data = {}, method = "GET" }) => {
    try {
        const token = document.getElementsByName("csrf-token")[0].getAttribute("content");

        if (method === "GET")
            return await fetch(path, {
                method,
                headers: {
                    url: "/payment",
                    "X-CSRF-Token": token
                },
            }).then((res) => res.json());

        return await fetch(path, {
            method,
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                url: "/payment",
                "X-CSRF-Token": token
            },
            body: JSON.stringify(data),
        }).then((res) => res.json());
    } catch (e) {
        console.log(e);
    }
};

const addOption = (id) => {
    const container = document.getElementById("option-container-" + id);
    const input = document.createElement("input")
    input.classList.add("mb-3", "form-control", `field-option-${id}`);
    input.setAttribute("required", "required");
    input.setAttribute("placeholder", "Опция");
    container.appendChild(input)
}

const addField = async (fieldType) => {
    const fieldsCount = document.getElementById("fieldsCount").value;

    const result = await sendRequest({
        path: `/form/${fieldType}/${fieldsCount}`,
        method: "GET",
    });

    if(result.code == 200){
        const newBlock = document.createElement("div");
        const delButton = document.createElement("button");
        newBlock.setAttribute("id", "field-block-" + document.getElementById("fieldsCount").value);
        newBlock.innerHTML = result.page;
        document.getElementById("fieldsContainer").appendChild(newBlock);
        document.getElementById("fieldsCount").value = parseInt(fieldsCount) + 1;
    }

    console.log(document.getElementById("fieldsCount").value);
}

const createForm = async() => {
    const count = document.getElementById("fieldsCount").value
    const data = {
        formName: document.getElementById("formNameInput").value,
        fields: []
    }

    for(let i = 0; i < count; ++i) {
        if(!document.getElementById("field-" + i)) {
            data.fields.push({});
            continue;
        }

        data.fields.push({
            fieldType: document.getElementById("field-" + i).value,
            fieldName: document.getElementById("field-name-" + i).value,
            fieldDescription: document.getElementById("field-description-" + i).value,
            inputType: document.getElementById("field-type-" + i)?.value,
            fieldOptions: [],
        });

        const options = document.getElementsByClassName("field-option-" + i);
        for(let option of options)
            data.fields[i].fieldOptions.push({option: option.value})
    }

    const result = await sendRequest({
        path: `/form/store`,
        method: "POST",
        data: {...data, fields: data.fields.filter(item => item.fieldName)}
    });

    if(result.code == 200) window.location.href = "/";
}

const updateForm = async() => {
    const fields = document.getElementsByClassName("field-id");
    const count = document.getElementById("fieldsCount").value;
    const data = {
        formName: document.getElementById("formNameInput").value,
        fields: []
    };

    for(let i = 0; i < fields.length; ++i) {
        const id = fields[i].value;
        data.fields.push({
            fieldId: id,
            fieldName: document.getElementById("field-name-" + id).value,
            fieldDescription: document.getElementById("field-description-" + id).value,
            inputType: document.getElementById("field-type-" + id)?.value,
            fieldOptions: [],
            fieldType: document.getElementById("field-" + id)?.value
        });

        const options = document.getElementsByClassName("field-option-" + id);
        for(let option of options)
            data.fields[i].fieldOptions.push({option: option.value})
    }

    for(let i = 0; i < count; ++i) {
        if(!document.getElementById("field-" + i)) {
            data.fields.push({});
            continue;
        }

        data.fields.push({
            fieldId: "",
            fieldType: document.getElementById("field-" + i).value,
            fieldName: document.getElementById("field-name-" + i).value,
            fieldDescription: document.getElementById("field-description-" + i).value,
            inputType: document.getElementById("field-type-" + i)?.value,
            fieldOptions: [],
        });

        const options = document.getElementsByClassName("field-option-" + i);
        for(let option of options)
            data.fields[i].fieldOptions.push({option: option.value})
    }

    const result = await sendRequest({
        path: `/form/update/${document.getElementById("formId").value}`,
        method: "POST",
        data: {...data, fields: data.fields.filter(item => item.fieldName), deletedFields: JSON.parse(localStorage.getItem('deleteQueue'))}
    });

    if(result.code == 200)
        document.getElementById("updateMessage-text").innerText = result.message;
    else
        document.getElementById("updateMessage-text").innerText = "Не удалось обновить форму";

    document.getElementById("updateMessage").style.display = "block";
    setTimeout(() => {document.getElementById("updateMessage").style.display = "none";}, 2000)
}

const deleteField = (id) => {
    document.getElementById("field-container-" + id).remove();
}

const addToDeleteQueue = (id) => {
    document.getElementById("field-container-" + id).remove();
    let deleteQueue = localStorage.getItem('deleteQueue');

    if(deleteQueue) {
        deleteQueue = JSON.parse(deleteQueue);
        deleteQueue.push(id);
        localStorage.setItem('deleteQueue', JSON.stringify(deleteQueue))
        console.log(deleteQueue);
    } else {
        deleteQueue = [id];
        localStorage.setItem('deleteQueue', JSON.stringify(deleteQueue))
    }
}
