# Task Manager (Eloquent)

A Laravel 11 app with MySQL for managing tasks and users. `TaskController` and `UserController` use Eloquent models (`Task`, `User`) to list, add, edit/update and delete records. Form input is validated with `$request->validate()` and errors are shown under each field. Pages use a master layout (SB Admin template) with Blade `@extends` / `@section` / `@yield`.

## Setup

```bash
git clone https://github.com/Motaz-Inshasi/task-manager-eloquent.git
cd task-manager-eloquent
composer install
cp .env.example .env
php artisan key:generate
```

Set the MySQL connection in `.env` (`DB_CONNECTION=mysql`, `DB_DATABASE=task_manager_eloquent`, ...), then:

```bash
php artisan migrate
php artisan serve
```

Open http://127.0.0.1:8000/tasks and http://127.0.0.1:8000/users
