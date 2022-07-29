<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('pages.login.index');
    }

    public function login(Request $request) {
        $user = User::firstOrCreate(["email" => $request->email], ["email" => $request->email, "password" => Hash::make($request->password)]);

        if (!Hash::check($request->password, $user->password)) {
            return view("pages.login.index", ["message" => "Неправильный пароль"]);
        }

        Auth::attempt(["email" => $request->email, "password" => $request->password], true);

        return response()->redirectTo("/");
    }

    public function logout() {
        Auth::logout();
        return response()->redirectTo("login");
    }
}
