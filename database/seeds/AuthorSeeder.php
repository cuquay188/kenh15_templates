<?php

use Illuminate\Database\Seeder;
use \App\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = new Author();
        $author->name = 'Phạm Văn Trí';
        $author->age = 20;
        $author->address = '24 Tăng Bạt Hổ';
        $author->save();

        $author = new Author();
        $author->name = 'Lê Thị Thùy Dung';
        $author->age = 19;
        $author->address = '344 Ngũ Hành Sơn';
        $author->save();

        $author = new Author();
        $author->name = 'Lê Quốc Mạnh';
        $author->age = 20;
        $author->address = 'Đà Nẵng';
        $author->save();

        $author = new Author();
        $author->name = 'Thái Thị Hồng Minh';
        $author->age = 20;
        $author->address = 'Quảng Trị';
        $author->save();
    }
}
