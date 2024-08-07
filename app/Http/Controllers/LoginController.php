<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(Request $request)
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        //session()->put('session-key', 'session-value');

        $validatedData = $request->validate([
            'email' => ['required', 'string', 'max:50', 'email', 'exists:users,email'], // проверка что в базе есть такой e-mail в таблице users
            'password' => ['required', 'string', 'min:5', 'max:50'], // проверка пароля и сравнение его с password_confirmation
        ]);

        if (auth('web')->attempt($validatedData)) {
            // dd(Auth::user()->name);
            $messageString = "Добро пожаловать " . Auth::user()->name . ".";
            alert(__($messageString), 'success');
            return redirect()->route('user.menus.index');
        } else {
            alert(__('Вход не выполнен'), 'danger');
            return redirect()->route('login');
        }

    }


    public function logout()
    {
        auth('web')->logout();
        return redirect()->route('home');
    }
}
