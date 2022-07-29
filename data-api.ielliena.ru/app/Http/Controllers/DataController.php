<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Form;
use App\Models\FormData;
use App\Models\FormField;
use App\Services\DataCreate;

class DataController extends Controller
{
    public function getFormById(array $params)
    {
        $form = Form::where("form_uid", $params["form_uid"])->first();
        $fields = FormField::where("form_id", $form->id)->get();

        $data = [
            "page" => view('pages.api.form', ["form" => $form, "fields" => $fields])->render(),
        ];

        return $data;
    }

    public function saveFormData(array $params)
    {
        $data =  FormData::create([
            "form_id" => $params["formId"],
            "data" => json_encode($params["data"])
        ]);

        return ["message" => "Данные успешно сохранены"];
    }

    public function getDataById(array $params)
    {
        $form = Form::where("form_uid", $params["form_uid"])->first();
        $data =  FormData::where("form_id", $form->id)->select("data")->get();

        $data = [
            "page" => view('pages.api.data', ["data" => $data])->render(),
        ];

        return $data;
    }
}
