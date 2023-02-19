# Student App

Student App is an application used to manage student data along with their respective classrooms, and the purpose of creating this system is for learning purposes on Laravel version 9. This application was created using Laravel v9 and requires a minimum of PHP v8.0, so if during the installation or usage process there are errors or bugs, it is possible that it is due to an unsupported PHP version.

## Tech Stack

- **Client :** HTML, CSS, Bootstrap 5, Blade Template
- **Server :** PHP with Laravel


## Run Locally

Clone the project

```bash
  git clone https://github.com/khalilannbiya/student-app.git
```

Or Download ZIP

[Link](https://github.com/khalilannbiya/student-app/archive/refs/heads/main.zip)

Go to the project directory

```bash
  cd student-app
```

Run the command

```bash
  composer update
```

Or

```bash
  composer install
```

Copy the .env file from .env.example.

```bash
  cp .env.example .env
```

Configure the .env file

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=student_app
  DB_USERNAME=root
  DB_PASSWORD=
```

Opsional

```bash
  APP_NAME=Student
  APP_ENV=local
  APP_KEY=base64:308iFheVu+blIs8b8x4Hj1pVzOutSoQNPuiw6pdB6JM=
  APP_DEBUG=true
  APP_URL=http://student-app.test
```

Generate key

```bash
  php artisan key:generate
```

Migrate database

```bash
  php artisan migrate
```

Seeder table student_classes

```bash
  php artisan db:seed --class=StudentClassSeeder
```

Run serve

```bash
  php artisan serve
```
## Documentation

- [HTML](https://developer.mozilla.org/en-US/docs/Web/HTML)
- [CSS](https://developer.mozilla.org/en-US/docs/Web/CSS)
- [Bootstrap 5](https://getbootstrap.com/)
- [Blade Template](https://laravel.com/docs/9.x/blade)
- [Laravel](https://laravel.com/docs/9.x)

## Features

- Student Management
- Classroom Management 


## Feedback

If you have any feedback, please reach out to us at syeichkhalil@gmail.com
