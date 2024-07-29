<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
//use Illuminate\Database\Query\Builder;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
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
//
//        $posts = array_fill(0, 10, $post);
//        ==== тема с request добавляем поля фильтрации в query
        //dd($request);
        $categories = [
            null => __('Все категории'),
            1 => __('Первая категория'),
            2 => __('Вторая категория')
        ];
//        $search = $request->input('search');
//         // dd($search, $posts);
//        if ($search) {
//
//            $posts = array_filter($posts, function($post) use($search) {
//                return str_contains(strtolower($post->title), strtolower($search));
//            });
//        }
//        $posts = array_filter($posts, function($post) use($search) {
//            if($search && ! str_contains(strtolower($post->title), strtolower($search))) {
//                return false;
//                }
//        });
//        $posts = Post::all();
//        $posts = Post::all(['id', 'title', 'content', 'published_at']);

//        $posts = Post::query()->limit(12)->get(['id', 'title', 'content', 'published_at']);
//        $posts = Post::query()->limit(12)->offset(12)->get(['id', 'title', 'content', 'published_at']);
        // подключаем встроенную поджинацию
//        $posts = Post::query()->paginate(12,['id', 'title', 'content', 'published_at']);
        // сортировка вывода
//        $posts = Post::query()->orderBy('published_at', 'DESC')->paginate(12,['id', 'title', 'content', 'published_at']);
        // заменяем на алиас oldest latest ВАЖНО - если нет аргумента то по полю created_at
//        $posts = Post::query()->latest('published_at')->paginate(12,['id', 'title', 'content', 'published_at']);

//        $posts = Post::query()->latest('published_at')->toSql();
//        dd($posts);


//        $posts = Post::query()->paginate(12);

//        $users = User::with('posts')->toSql();
//        dd($users); // "select * from `users`" // app/Http/Controllers/BlogController.php:70
        // Конечная тема с фильтрацией на странице
        $validated = $request->validate([
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'search' => ['nullable', 'string','min:1', 'max:100'],
            'category_id' => ['nullable', 'string'],
            'from_date' => ['nullable', 'string', 'date'],
            'to_date' => ['nullable', 'string', 'date', 'after:from_date'],
            'tag' => ['nullable', 'string', 'max:10'],
            ]);
//        phpinfo();
//        dd();
        //  dd($validated['search']?? 'нет поиска', $validated);
        // debugbar();
         if ($search = $validated['search'] ?? null) {
             if ($search === 'Деньги') {
//                 dd('условие выполнено');
                             throw ValidationException::withMessages([
                'account' => __('Не достаточно денег'),
            ]);
             }
         }

        // пример какой-либо проверки и при ее непрохождении кидаем исключение ValidationException
        // с redirect на ту-же форму и выводм сообщения об ошибке

//        if (true) {
//            throw ValidationException::withMessages([
//                'account' => __('Не достаточно денег'),
//            ]);
//        };

        // 1-й вариант

//        $posts = Post::query()
//            ->when($validated['search'] ?? null, function (Builder $query, $search) {
//                // dd($search);
//                $query->where('title', 'like', "%{$search}%");
//                })
//            ->paginate(12);

//        // 2-й вариант
//
//        $query = Post::query();
//        $query->when($validated['search'] ?? null, function (Builder $query, $search) {
//            // dd($search);
//            $query->where('title', 'like', "%{$search}%");
//        });
//        $query->where('published', '=', true);
//
//        $posts = $query->paginate(12);

        // 3-й вариант через If

        $query = Post::query();
        $query->where('published', '=', true);

        if ($search = $validated['search'] ?? null) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($tag = $validated['tag'] ?? null) {
            $query->whereJsonContains('tags', $tag);
        }

        // session(['hello'=>'HELLO']);

        $posts = $query->paginate(12);

        // ========== 4-й вариант
//        $query = Post::query();
//        $search = $validated['search'] ?? null;
//        $search
//            ? $query->where('title', 'like', "%{$search}%")
//            : '';
//        // dd($query->toSql());
//
//        $posts = $query->paginate(12);



        return view('blog.index', compact('posts', 'categories')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $postId)
    {
        $post = Post::find($postId);
        //dd($post->content); // "Что-то там для первого" // app/Http/Controllers/BlogController.php:107
//        return "Показываем пост {$postId}";
        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function like(Request $request, int $postId)
    {
        // dd($request);
        return "Добавляем Like +1 к посту: {$postId}";
    }
}
