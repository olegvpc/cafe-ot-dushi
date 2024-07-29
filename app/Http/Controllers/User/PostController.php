<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //return 'Показываем все посты в домене blog/index';
        // ТЕСТОВЫЙ МАССИВ С ПОСТАМИ
//        $post = (object)[
//            'id'=>123,
//            'title'=>'Lorem ipsum dolor sit amet.',
//            'content'=>'Lorem ipsum <strong>dolor</strong> sit, amet consectetur adipisicing elit. Praesentium, sequi.',
//            'published_at' => now()->format('Y.m.d H:i:s')
////            'getID'=> protected function()
////            {
////             return $this->id;
////            },
//        ];

//        $posts = array_fill(0, 10, $post);

//        if (true) {
//            throw ValidationException::withMessages([
//                'account' => __('Не достаточно денег'),
//            ]);
//        };

//        ==== тема с request добавляем поля фильтрации в query
        // dd($request);
//        phpinfo();
//        dd();
        if (Auth::check()) {
            $userId = Auth::user()->id;
            // dd($userId); //1004
//            $post = Post::query()->first();
//            dd($post->published_at, now()); // Carbon
             $posts = Post::query()
                 ->where('user_id', $userId)
                 ->where('published', '=',true)
                 ->where('published_at', '<=', now())
                 ->paginate(12);
             // dd($posts);
        } else {
            $posts = collect([]);
        }

        return view('user.posts.index', compact('posts')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return "Site USER for creating post";
        return view('user.posts.create');
    }

    /**
     * Store a newly created resource in storage. - вадидация данных идет через отделный класс StorePostRequest
     */
//    public function store(StorePostRequest $request)
//    {
//        // получаем проверенные согласно правилам данные запроса
//        //dd($request->all());
//        $validated = $request->validated();
//
//        // Используем ValidationExceptin для любых проверок в проекте (в данный момент на посте)
//        // К примеру если нет денег у Пользователя - он не может разместить пост
//        if (true) {
//            throw ValidationException::withMessages([
//                'account' => __('Не достаточно денег'),
//            ]);
//        };
//        dd($validated);
//    }

    public function store(Request $request)
    {
        // тут валидация проходит прямо к контроллере, но с использованием кастомного helpers validate()
        //dd($request->all());
        $validated = validate($request->all(), [
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
            'published_at' => ['nullable', 'string','date'],
            'published' => ['nullable', 'boolean'],
        ]);

        // Используем ValidationExceptin для любых проверок в проекте (в данный момент на посте)
        // К примеру если нет денег у Пользователя - он не может разместить пост
//        if (true) {
//            throw ValidationException::withMessages([
//                'account' => __('Не достаточно денег'),
//            ]);
//        };
        //dd($validated);

//        $post = Post::query()->create([
//            'user_id' => Auth::id(),
//            //'user_id' => User::query()->value('id'), // первого попавшего юзера
//            'title' => $validated['title'],
//            'content' => $validated['content'],
//            'published_at' => new Carbon($validated['published_at']?? null),
//            'published' => $validated['published'] ?? false,
//            ]);
        // лучше использовать метод firstOrCreate - он получает в аргументы два массива - по первому
        // ищет нет ли в базе уже такого поста, если есть, то возвращает его, если нет, то создает новый
        $post = Post::query()->firstOrCreate([
            'user_id' => Auth::id(),
            // 'user_id' => User::query()->value('id'), // первого попавшего юзера
            'title' => $validated['title'],
        ],
        [
            'content' => $validated['content'],
            'published_at' => new Carbon($validated['published_at']?? null),
            'published' => $validated['published']?? false,
        ]);
        // dd($validated);
        // dd($post->toArray());

        // пример какой-либо проверки и при ее непрохождении кидаем исключение ValidationException
        // с redirect на ту-же форму и выводм сообщения об ошибке
        if ($validated['title'] === 'Деньги') {
            throw ValidationException::withMessages([
                'account' => __('Не достаточно денег'),
            ]);
        };

        if ($post->title === $validated['title'] && $post->content === $validated['content']) {
            alert(__("Создан новый пост $post->id!"), 'primary');
            return redirect()->route('user.posts.show', $post->id);
        } else if ($post->title === $validated['title'] && $post->content !== $validated['content']) {
            alert(__("Пост с таким названием уже есть в базе"), 'danger');
            return redirect()->route('user.posts.create');
        } else  {
            alert(__("Что-то пошло не так"), 'danger');
            return redirect()->route('user.posts.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($post_id)
//    public function show(Post $post)
    {
        // return "Site showing current post: " . $post_id; //  Site showing current post- {$id}
        // return "Site USER showing current post- posts/{post}  {$id}"; //  Site showing current post- 123
//         $post = (object)[
//         	'id'=>123,
//         	'title'=>'Lorem ipsum dolor sit amet.',
//         	'content'=>'Lorem ipsum <strong>dolor</strong> sit, amet consectetur adipisicing elit. Praesentium, sequi.',
//            'published_at' => now()->format('Y.m.d H:i:s'),
//         ];
         // $post = Post::query()->findOrFail($post_id);
        //dd($post, $post_id);
        // $csrfToken = csrf_token();
        //dd($csrfToken); // "tnFhAQHBtYmS67Ocg8YkCdD3WWWlfRr9hhIhzENR"

        // тема "route model binding" - Если указать тип данных Post в переменной, то Laravel сам найдет пост
        // dd($post); // выдает модель поста с id= поста

        // мажем закешировать пост в cache()
//        $post = Post::query()->findOrFail($post_id);
        // dd($post);
         //dd(DB::table('posts')->where('user_id', '=', '1004')->first());
         // dd(Post::query());
        $post = cache()->remember(
            key: "posts.{$post_id}",
            ttl: now()->addHour(),
            callback: function() use ($post_id) {
                info("read post " . $post_id . " from DB and save in cache");
                return Post::query()
                  ->findOrFail($post_id, ['id', 'title', 'content', 'published_at']);
        });
        return view('user.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $post)
    {
        $post = (object)[
            'id'=>123,
            'title'=>'Lorem ipsum dolor sit amet.',
            'content'=>'Lorem ipsum <strong>dolor</strong> sit, amet consectetur adipisicing elit. Praesentium, sequi.',
        ];
        // return "Site USER editing post posts/{post}/edit  - method GET - {$id}";
        return view('user.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        // dd($title, $content, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function like($post)
    {
        return "Лайки на пост - {$post} method POST";
    }
}
