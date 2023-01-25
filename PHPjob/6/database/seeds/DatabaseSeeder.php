<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 
        $this->call(UsersTableSeeder::class);
    }
    // \PHPjob\6\database\factories\UsersFactory.php
}

// http://127.0.0.1:8000/post/create
