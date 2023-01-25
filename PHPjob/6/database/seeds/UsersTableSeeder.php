<?php

use Illuminate\Database\Seeder;

use App\User; // 追記

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class, 3)->create();
    }
}
// PS C:\xampp\htdocs\LetsEngineer\curriculum2\PHPjob\6> php artisan make:seeder UsersTableSeeder
// Seeder created successfully.

// \database\seeds\DatabaseSeeder.php

// \app\Providers\AppServiceProvider.php
// register()関数の中に FakerFactory::create('ja_JP')と記述。
