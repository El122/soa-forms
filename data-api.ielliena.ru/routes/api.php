<?php

use App\Services\JsonRpcServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test', function () {
    return "Success GET";
});


Route::post('/test', function () {
    return "Success POST";
});

Route::post('/data', function (Request $request, JsonRpcServer $server) {
    return $server->handle($request);
});
