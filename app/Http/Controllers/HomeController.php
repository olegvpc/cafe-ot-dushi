<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'max:50', 'email', 'exists:users,email'], // проверка что в базе есть такой e-mail в таблице users
            'password' => ['required', 'string', 'min:5', 'max:50'], // проверка пароля и сравнение его с password_confirmation
        ]);
        // dd($validatedData);

        if (auth('web')->attempt($validatedData)) {
            $messageString = "Добро пожаловать / ยินดีต้อนรับ " . Auth::user()->name . ".";
            alert(__($messageString), 'success');
            return redirect()->route('user.posts.index');
        } else {
            alert(__('Вход не выполнен'), 'danger');
            return redirect()->route('login');
        };

        return redirect()->route('blog.index');
    }
}
