## Tentang Aplikasi

Student App adalah aplikasi yang digunakan untuk mengelola data siswa beserta ruang kelas masing-masing dan tujuan membuat sistem ini untuk sekedar pembelajara pada Laravel versi 9. Aplikasi ini dibuat menggunakan Laravel v9.\* dan minimal PHP v8.0 jadi apabila pada saat proses instalasi atau penggunaan terdapat error atau bug kemungkinan karena versi dari PHP yang tidak support.

### Beberapa Fitur yang tersedia:

-   Manajemen Siswa
-   Manajemen Ruang Kelas

## Instalasi

#### Via Git

```bash
git clone https://github.com/khalilannbiya/student-app.git
```

### Download ZIP

[Link](https://github.com/khalilannbiya/student-app/archive/refs/heads/main.zip)

### Setup Aplikasi

Jalankan perintah

```bash
composer update
```

atau:

```bash
composer install
```

Copy file .env dari .env.example

```bash
cp .env.example .env
```

Konfigurasi file .env

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

Menjalankan aplikasi

```bash
php artisan serve
```

## License

[MIT license](https://opensource.org/licenses/MIT)
