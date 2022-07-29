<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormData;
use App\Models\FormField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function index() {
        $forms = Form::where("user_id", Auth::user()->id)->orderBy("id", "DESC")->get();
        return view('pages.forms.index', ["forms" => $forms]);
    }

    public function create() {
        return view('pages.forms.create');
    }

    public function field($field, $count) {
        return response()->json(["code" => 200, "page" => view('components.createFields.'.$field, ["count" => $count])->render()]);
    }

    public function store(Request $request) {
        $form = Form::create([
            "user_id" => Auth::user()->id,
            "name" => $request->formName
        ]);
        $form->form_uid = uniqid('form'.$form->id."_");
        $form->save();

        foreach($request->fields as $item) {
            FormField::create([
                "form_id" => $form["id"],
                "name" => $item["fieldName"],
                "type" => $item["fieldType"],
                "inputType" => isset($item["inputType"]) ? $item["inputType"] : null,
                "description" => $item["fieldDescription"],
                "selectOptions" => json_encode($item["fieldOptions"])
            ]);
        }

        return response()->json([
            "code" => 200,
            "message" => "Ваша форма успешно создана"
        ]);
    }

    public function edit($id) {
        if(!Form::where("user_id", Auth::user()->id)->find($id)) return redirect("/");

        $form = Form::find($id);
        $fields = FormField::where("form_id", $form->id)->get();

        return view('pages.forms.edit', ["form" => $form, "fields" => $fields]);
    }

    public function update($id, Request $request) {
        $form = Form::where("user_id", Auth::user()->id)->where("id", $id)->first();
        $form->name = $request->formName;
        $form->save();

        foreach($request->fields as $item) {
            $fields = FormField::where("form_id", $form->id)->where("id", $item["fieldId"])->updateOrCreate([
                "name" => $item["fieldName"],
                "inputType" => isset($item["inputType"]) ? $item["inputType"] : null,
                "description" => $item["fieldDescription"],
                "selectOptions" => json_encode($item["fieldOptions"])
            ], [
                "form_id" => $form->id,
                "name" => $item["fieldName"],
                    "type" => isset($item["fieldType"]) ? $item["fieldType"] : "input", // Добавить скрытое поле с типом
                "inputType" => isset($item["inputType"]) ? $item["inputType"] : null,
                "description" => $item["fieldDescription"],
                "selectOptions" => json_encode($item["fieldOptions"])]
            );
        }

        if($request->deletedFields)
        foreach($request->deletedFields as $item) {
            $fields = FormField::where("id", $item)->delete();
        }

        return response()->json([
            "code" => 200,
            "message" => "Ваша форма успешно обновлена"
        ]);
    }

    public function show($id) {
        if(!Form::where("user_id", Auth::user()->id)->find($id)) return redirect("/");

        $form = Form::find($id);
        $fields = FormField::where("form_id", $form->id)->get();

        return view('pages.forms.show', ["form" => $form, "fields" => $fields]);
    }

    public function data($id) {
        if(!Form::where("user_id", Auth::user()->id)->find($id)) return redirect("/");

        $form = Form::find($id);
        $data = FormData::where("form_id", $id)->get();

        return view('pages.forms.data', ["data" => $data, "formName" => $form->name]);
    }

    public function remove($id) {
        if(!Form::where("user_id", Auth::user()->id)->find($id)) return redirect("/");

        $form = Form::find($id)->delete();

        return redirect("/");
    }
}
