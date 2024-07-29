<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(Request $request)
    {
        // тема - request/response
//        $ip = $request->ip();
//        $path = $request->path();
//        $url = $request->url();
//        $fullurl = $request->fullUrl();


        // dd($ip, $path, $url, $fullurl);

        // dd($request->is('login'), $request->routeIs('log*'));
        // return "LOGIN SITE HERE";
        // return app('view')->make('login.index')
        // return view()->make('login.index')
        // return View::make('login.index');

        // тема - sessions
//        dd(session()->get('session-key'));

        // dd(session()->all(), session()->has('foo'));

        return view('login.index');
    }

    public function store(Request $request)
    {
        // тема - request/response

        // $ip = $request->ip();
        // $path = $request->path();
        // $url = $request->url();
        // $fullurl = $request->fullUrl();
        // $search = $request->input('search');
        // $category_id = $request->input('category_id');

        // // dd($search, $category_id);
        // dd($ip, $path, $url, $fullurl);

         $email = $request->input('email');
         $password = $request->input('password');
         $remember = $request->boolean('remember');
//         dd($email, $password, $remember);
         // return "LOGIN STORE";

        // return response()->redirectTo('/foo');
        // return redirect('/foo');

        // ------------------------ тема - sessions
        // $session = app()->make('session');
        // $session = app('session');
         $session = session();
        // $session = Session::get('key');
        // $session = Session::put('key');
         session()->put('session-key', 'session-value');

         // dd($session);

        // можно зписывать данные в сессию через ХЕЛПЕР и массив в аргументе
        // session([
        // 	'session-key'=>'Session-Value',
        // 	'name'=>'Oleg',
        // 	'foo'=>'Bar'
        // ]);
        // session()->forget('foo');
        // session()->flush();

//        авторизация пользователя через ХЕЛПЕР
////        auth('web')->attempt();
//        auth('web')->login($email);
//        session(['user' => $email]);
//        // ---------------------- тема alert - успешная аутентификация пользователя
//        // session(['alert' => __('Добро пожаловать!')]);
//
//        // создаем функцию helper: alert()
//        alert(__('Добро пожаловать!'), 'success');

//         if(true){
//         	return redirect()->back()->withInput();
//         };

        $validatedData = $request->validate([
            'email' => ['required', 'string', 'max:50', 'email', 'exists:users,email'], // проверка что в базе есть такой e-mail в таблице users
            'password' => ['required', 'string', 'min:5', 'max:50'], // проверка пароля и сравнение его с password_confirmation
        ]);
        // dd($validatedData);

        // $remember = $request->boolean('remember');
        // dd($email, $password, $remember);
        // return "LOGIN STORE";
        if (auth('web')->attempt($validatedData)) {
            // dd(Auth::user()->name);
            $messageString = "Добро пожаловать " . Auth::user()->name . ".";
            alert(__($messageString), 'success');
            return redirect()->route('user.posts.index');
        } else {
            alert(__('Вход не выполнен'), 'danger');
            return redirect()->route('login');
        };

        return redirect()->route('blog.index');

    }


    public function logout()
    {
        auth('web')->logout();
        // dd(Auth::check());
        return redirect()->route('blog.index');
    }
}
