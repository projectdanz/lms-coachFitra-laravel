<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        // ]);

        $isProd = config('app.env') === 'production' ? true : false;

        Course::create([
            'nama' => 'Ruang Kelas Menjadi Sales Jago Closing',
            'harga' => $isProd ? 299000 : 1,
            'password' => 'MbCk3l4S001',
            'course_url' => 'https://ecourse.sekolahkaya.com/courses/introduction-to-photography-masterclass/',
        ]);
    }
}
