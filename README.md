# book
book for stork:

CRUD book с аякс поиском(live search)  и админ панелью.

# Описание
Реализация на собственном мини фреймворке с единой точкой входа через .htaccess по паттерну MVC с ORM Redbean, 
для автозагрузки файлов используется подключенный composer.
Дополнительно добавил из функционала админ панель, сделал разделение пользователей по ролям('user', 'admin') и поиск по имени live search через ajax,
редактирование своих данных, админка соответственно доступна по адресу '/admin' для пользователей с правами администратора.
Среди файлов содержится дамп БД: 'book.sql' .

# Установка & Проверка
1. Создать папку book.loc  
2. Скопировать туда содержимое репозитория
3. Создать БД 'book'
4. Запустить файл дампа SQL - book.sql (в котором содержится таблица 'user'), в файле book.loc/config/config_db.php настроить данные пользователя
5. Используется web-сервер apache, тк файл .htaccess перенаправляет все запросу в одну точку входа
6. Открыть в браузере адрес 'book.loc/' - выскочит форма авторизации
7. Ввести имя пользователя с правами администратора: 'Hulk', пароль: 123456
8. Представлена таблица с юзерами, где возможен просмотр контакта, а также поиск через ajax, после ввода каждого символа, а также сортировка
по полям: login, role, name + редактирование собственного аккаунта
9. Можно зайти в админ панель по адресу(тк пользователь Hulk является администратором):  'book.loc/admin' - где также доступен ajax поиск по полю 'name' + добавление, редактирование и удаление 
пользователя, также сортировка по трем полям
10. Контроллер для пользовательской части находится по адресу: book.loc/app/controllers/MainController.php, для админ панели: book.loc/app/controllers/admin/UserController.php
Файлы видов: book.loc/app/views/Main/index.php и для админ панели: book.loc/app/views/admin/User/index.php
Файлик с js: book.loc/public/js/test.js
Файл конфига для БД: book.loc/config/config_db.php

# Скриншоты
- https://monosnap.com/file/NrJb4Zyvd6v384WPjvAkWYPAjEHe66
- https://monosnap.com/file/VsEggSYpOsNPBm0mlxHbJaO77FIGSe


