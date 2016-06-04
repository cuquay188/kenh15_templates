<?php

use App\Category as Cat;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Cat();
        $category->name = 'Star';
        $category->save();

        $category = new Cat();
        $category->name = 'Musik';
        $category->save();
    }
}
