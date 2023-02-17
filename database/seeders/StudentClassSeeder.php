<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'name' => 'X TKJ 1',
                'slug' => 'x-tkj-1'
            ],
            [
                'name' => 'X TKJ 2',
                'slug' => 'x-tkj-2'
            ],
            [
                'name' => 'X TKJ 3',
                'slug' => 'x-tkj-3'
            ],
        ];

        foreach ($classes as $studentClass) {
            $class = new StudentClass();

            $class->name = $studentClass['name'];
            $class->slug = $studentClass['slug'];

            $class->save();
            // jalankan perintah php artisan db:seed --class=StudentClassSeeder
        }
    }
}
