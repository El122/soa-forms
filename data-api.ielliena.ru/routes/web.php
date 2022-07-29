<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware("auth")->group(function () {
    Route::get('/', [FormController::class, "index"])->name("form.index");
    Route::get('/form/create', [FormController::class, "create"])->name("form.create");
    Route::post('/form/store', [FormController::class, "store"])->name("form.store");
    Route::get('/form/edit/{id}', [FormController::class, "edit"])->name("form.edit");
    Route::get('/form/data/{id}', [FormController::class, "data"])->name("form.data");
    Route::get('/form/show/{id}', [FormController::class, "show"])->name("form.show");
    Route::get('/form/remove/{id}', [FormController::class, "remove"])->name("form.remove");
    Route::get('/form/{field}/{count}', [FormController::class, "field"])->name("form.field");
    Route::post('/form/update/{id}', [FormController::class, "update"])->name("form.update");
});

Route::get('/login', [LoginController::class, "index"])->name("loginPage");
Route::post('/login', [LoginController::class, "login"])->name("login");
Route::get('/logout', [LoginController::class, "logout"])->name("logout");
