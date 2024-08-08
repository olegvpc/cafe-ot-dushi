

### О проекте / About the project::
#### 1: Проект по управлению Кафе (рестораном) выполнено на Laravel с БД MySQL / Cafe (restaurant) management project done on Laravel with MySQL database
#### 2: Фронт отображает список из блюд с сортировкой по тайской и русской кухне плюс полезная информация / The front displays a list of dishes sorted by Thai and Russian cuisine plus useful information
##### Front выполнен с использованием VueJS / Front made using VueJS
![home01](https://github.com/olegvpc/cafe-ot-dushi/blob/main/public/img/home-01.jpg?raw=true)
#### 3: При развертывании проекта сидером формируется БД Юзеров, категорий (напитки, салаты, супы ...), кухни и базовое меню / When deploying a project as a cider, a database of Users, categories (drinks, salad, soup ...), cuisines and a basic menu is formed
#### 4: Возможен вход с правами admin для корректировки меню (возможно добавить в настройки корректировку кухни и категорий) / You can log in with admin rights to adjust the menu (it is possible to add kitchen and category adjustments to the settings)
![home-menu](https://github.com/olegvpc/cafe-ot-dushi/blob/main/public/img/home-menu![img.png](img.png).jpg?raw=true)



#### Информация по deploy проекта хорошо описана тут / Information on project deployment is well described here
(https://www.youtube.com/watch?v=yo3FqtA2J9c)

### Запуск composer из файла в самом проекте / Running composer from a file in the project itself
```
php8.2 composer.phar install
```
### Создание виртуальных ссылок - в первую очередь для storage - где хрнятся файлы с картинками / Creating virtual links - primarily for storage - where files with pictures are stored
```
php8.2 artisan storage:link
```
### При первом запуске выполнить генерацию ключа в .env, миграции и записать начальные данные / At the first start, generate a key in .env, migrate and write down the initial data
```
cp .env.example .env
php8.2 artisan key:generate
php8.2 artisan migrate
php8.2 artisan db:seed
```
### Обновление кода / Code update
```
git pull origin main
```
### Creating dump of DB
```
mariadb-dump --all-databases -uroot -p > ~/Documents/armf-loc-dump.sql
```

### Deploy dump of DB on server
```
mysql -uusername -p database < finterra_online1.sql
```
