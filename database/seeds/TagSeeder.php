<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag();
        $tag->name = 'Sinh viên';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Đời sống';
        $tag->save(); 

        $tag = new Tag();
        $tag->name = 'Nhà';
        $tag->save(); 

        $tag = new Tag();
        $tag->name = 'Cửa';
        $tag->save(); 

        $tag = new Tag();
        $tag->name = 'Lao động';
        $tag->save(); 

        $tag = new Tag();
        $tag->name = 'Tri thức';
        $tag->save();  

        $tag = new Tag();
        $tag->name = 'Đại học';
        $tag->save(); 

        $tag = new Tag();
        $tag->name = 'Cao đẳng';
        $tag->save();
    }
}
