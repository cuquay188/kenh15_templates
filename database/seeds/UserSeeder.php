<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Phạm Văn Trí';
        $user->email = 'pvtri96@gmail.com';
        $user->username = 'admin';
        $user->password = bcrypt('admin');
        $user->tel = '01659331448';
        $user->address = '24 Tăng Bạt Hổ, Đà Nẵng';
        $user->city = 'Đà Nẵng';
        $user->birth = date_create('1996/09/02');
        $user->is_admin = 1;
        $user->save();

    }
}
