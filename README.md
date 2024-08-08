

### О проекте:
#### 1: Информация по deploy проекта хорошо описана тут
(https://www.youtube.com/watch?v=yo3FqtA2J9c)
#### 2: Front выполнен с использованием VueJS
![home01](https://github.com/olegvpc/cafe-ot-dushi/blob/main/public/img/home-01.jpg?raw=true)

# Запуск composer из файла в самом проекте
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
# Обновление кода 
```
git pull origin main
```
# Сделать дамп бд
```
mariadb-dump --all-databases -uroot -p > ~/Documents/armf-loc-dump.sql
```

# Вставить готовый дамп в БД
```
mysql -uusername -p database < finterra_online1.sql
```
