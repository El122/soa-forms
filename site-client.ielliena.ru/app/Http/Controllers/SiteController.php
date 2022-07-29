<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JsonRpcClient;

class SiteController extends Controller
{
    private $form_uid = "form17_62e3a83c687e4";

    public function __construct(JsonRpcClient $client)
    {
        $this->client = $client;
    }

    public function index(Request $request)
    {
        $data = $this->client->send('getFormById', ['form_uid' => $this->form_uid]);

        if (empty($data['result'])) {
            return view("index", ["form" => "<p>Не удалось найти форму</p>"]);
        }

        return view("index", ["form" => $data["result"]["page"], "formId" => $this->form_uid]);
    }

    public function data()
    {
        $data = $this->client->send('getDataById', ['form_uid' => $this->form_uid]);

        if (empty($data['result'])) {
            return view("data", ["message" => "Не удалось найти данные с формы"]);
        }

        return view("data", ["page" => $data["result"]["page"]]);
    }
}
