<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        $this->call(AuthorSeeder::class);
//        $this->call(CategorySeeder::class);
//        $this->call(TagSeeder::class);
//        $this->call(ArticleSeeder::class);
//        $this->call(TagAticleSeeder::class);
//        $this->call(AuthorArticleSeeder::class);
        $this->call(UserSeeder::class); 
    }
}
