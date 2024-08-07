

# Запуск
```
php8.2 composer.phar install
```
# Создание виртуальных ссылок - в первую очередь для storage - где хрнятся файлы с картинками
```
php8.2 artisan storage:link
```

# При первом запуске выполнить генерацию ключа в .env, миграции и записать начальные данные
```
php artisan key:generate
php artisan migrate
php artisan db:seed
```

# Сделать дамп бд
```
mariadb-dump --all-databases -uroot -p > ~/Documents/armf-loc-dump.sql
```


# Вставить готовый дамп в БД
```
mysql -uusername -p database < finterra_online1.sql
```

class ImageUrlController extends Controller
{
public function __invoke($path_file)
{
if(Storage::exists('/public/images/'.$path_file)){
$image_path=response()->file(Storage::path('/public/images/'.$path_file));
}else {
$image_path=response()->file(Storage::path('/public/images/default.jpg'));
}

        return $image_path;
    }
}
