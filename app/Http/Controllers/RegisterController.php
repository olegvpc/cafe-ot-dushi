<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
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
        // dd(session()->get('session-key'));

        // dd(session()->all(), session()->has('foo'));

        return view('register.index');
    }

    function store(Request $request)
    {
        // тема - request/response
//        $ip = $request->ip();
//        $path = $request->path();
//        $url = $request->url();
//        $fullurl = $request->fullUrl();

//        if (true) {
//            return redirect()->back()->withInput();
//        }


        // dd($ip, $path, $url, $fullurl);

        // dd($request->is('login'), $request->routeIs('log*'));
        // return "LOGIN SITE HERE";
        // return app('view')->make('login.index')
        // return view()->make('login.index')
        // return View::make('login.index');

        // тема - sessions
        // dd(session()->get('session-key'));

        // dd(session()->all(), session()->has('foo'));

//        return response()->json(['hollo'=>'world']);
        // тема - Запись данных в БД
        $data = $request->all();
        // тема - получение даннных из объекта $request

        // $data = $request->only(['first-name', 'email']);
        // $data = $request->except(['password-confirmation', '_token']);
        $name = $request->input('first-name');
        $email = $request->input('email');
        $password = $request->input('password');

        $agreement = $request->boolean('agreement');
        // $checkbox = !! $request->input('remember');
        // ИЛИ
        // $checkbox = $request->boolean('remember');
        // $agreement = $request->has('agreement');
        // $avatar = $request->file('avatar')

        // dd($data, $name, $email, $password, $agreement);

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:50', 'email', 'unique:users,email'], // проверка что в базе нет такого e-mail
            'password' => ['required', 'string', 'min:5', 'max:50', 'confirmed'], // проверка пароля и сравнение его с password_confirmation
            'agreement' => ['accepted'], // true/1/yes
        ]);

//        dd($validated);
        // 1-й способ записи данных - через экземпляр класса модели
        // $user = new User;

        // $user->name = $validated['first_name'];
        // $user->email = $validated['email'];
        // $user->password = bcrypt($validated['password']);

        // $user->save();
        // 2-й способ записи данных - через свойство Фасада - но лучше с добавлением метода query()
        // потому что без query - это магический метод и под капотом все ревно добавляется query -> ОСНОВНОЙ
//        User::create([
//            'name' =>  $validated['first_name'],
//            'email' => $validated['email'],
//            'password' => bcrypt($validated['password']),
//        ]);
        // dd(User::query()); // это модель Builder
         $user = User::query()->create([
         	'name' =>  $validated['first_name'],
         	'email' => $validated['email'],
         	'password' => bcrypt($validated['password']),
         ]);
         // тут демонстрируется более короткая запись - передем для записи овалидированный массив и переопределяем в нем только пароль
        // $user = User::query()->create(
        // 	array_merge($validated, [
        // 		'password' => bcrypt($validated['password'])
        // 	]));


        // 3-й способ записи данных - через класс Модели прямо в конструктор
        // $user = new User([
        // 	'name' => $validated['first_name'],
        // 	// 'email' => $validated['email'],
        // ]);
        // $user->email = $validated['email'];
        // тут демонстрируем что заполнять данные можно и внутренними методами Builder такими как fill и setAttributes
        // $user->fill(['admin' => true]);
        // $user->setAttribute('password', bcrypt($validated['password']));

        // $user->save();
        // dd($user->toArray());

        alert(__('Регистрация выполнена!'), 'success');
        return redirect()->route('login');
    }
}
