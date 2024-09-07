<?php

use App\Models\Category;
use App\Models\Cuisine;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

if(! function_exists('test')) {
    function test()
    {
//        return app('test');
        return "Hello from helpers";
    }
}

if(! function_exists('active_link')) {
    function active_link(string $name, $active = 'active'): string
    {
        return Route::is($name) ? $active : '' ;
    }
}
if(! function_exists('alert')) {
    function alert(string $text_alert, $alert_status = 'info')
    {
        // dd($text_alert, $alert_status); 'primary'
        session(['alert' => $text_alert, 'alert_status' => $alert_status]);
    }
}

if(! function_exists('validate')) {
    function validate(array $attributes, array $rules): array {

        return validator($attributes, $rules)->validate();
    }
}

if(! function_exists('__money')) {
    function __money(string $amount): string {

        // dd(session('currency_error'));
        $value = number_format($amount, 0, '.', ' ');
        return $value;
    }
}


if(! function_exists('getCateriesMenu')) {
    function getCategoriesMenu(): array {
        $categoriesList = Category::query()->orderBy('sort', 'asc')->get(['id', 'name'])->toArray();
        //        dd($categories->toArray());
        //        array:5 [▼ // app/Http/Controllers/User/MenuController.php:33
        //  0 => array:2 [▼
        //    "id" => "SALAD"
        //    "name" => "Салат"
        //  ]
        //  1 => array:2 [▶]
        //  2 => array:2 [▶]
        //  3 => array:2 [▶]
        //  4 => array:2 [▶]
        $categories = [];
        foreach ($categoriesList as $item) {
            $categories [$item['id']] = $item['name'];
        }
        return $categories;
    }
}

if(! function_exists('getAllCuisines')) {
    function getAllCuisines(): array {
        $cuiseneList = Cuisine::query()->orderBy('sort', 'asc')->get(['id', 'name'])->toArray();
        $cuisines = [];
        foreach ($cuiseneList as $item) {
            $cuisines [$item['id']] = $item['name'];
        }
        return $cuisines;
    }
}

if(! function_exists('getAllCreditors')) {
    function getAllCreditors(): array {
        $userList = User::query()->get(['id', 'name'])->toArray();
//        $creditors = ['NULL'=> NULL];
        foreach ($userList as $item) {
            $creditors [$item['id']] = $item['name'];
        }
        return $creditors;
    }
}

if(! function_exists('transaction')) {
    function transaction(\Closure $callback, int $attempts = 1)
    {
        info("Уровень транзакции: " . DB::transactionLevel());
        if (DB::transactionLevel() > 0) {
            return $callback;
        }
        return DB::transaction($callback, $attempts);
    }
}

if(! function_exists('saveImageIn')) {
    function saveImageIn($request, string $folder): string
    {
        // Сохраняем файл в папку $folder коротая будет создана в пути starage/app/public
        $file = $request->file('image');
        $datePathName = now()->format('Y-m-d');
        if ($file) {
            if ($folder === 'payment-images') {
                $dateName = $datePathName . "-" . $file->getClientOriginalName();
                $pathToImageString = $file->storeAs($folder, $dateName, 'public');
            } else {
                $pathToImageString = $file->storeAs($folder, $file->getClientOriginalName(), 'public');
            }
        } else {
            $pathToImageString = 'images/no-image.jpeg';
        }
        return $pathToImageString;
    }
}

if(! function_exists('checkAndDeleteImage')) {
    function checkAndDeleteImage($request, $imagePath): void
    {

        if ( $request && !$request->file('image')) {
            return;
        }
        $imageMenuPath = Storage::path('/public/'.$imagePath);

// $imageMenuPath => "/var/www/html/storage/app/public/menu-images/круглый повар.png"
// $deletedMenu->image => "menu-images/drinks-kompot.jpeg"
        $firstItemOfPath = explode("/", $imagePath)[0];
        if ($firstItemOfPath !== 'images' && Storage::exists('/public/'.$imagePath)) {
            unlink($imageMenuPath);
        }
    }
}

