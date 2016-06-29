<?php

use Illuminate\Database\Seeder;
use App\User;

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
        $user->fullname = 'Lê Thị Thùy Dung';
        $user->email = 'dungle1811@gmail.com';
        $user->username = 'admin';
        $user->password = bcrypt('123');
        $user->tel = '01223200426';
        $user->save();

        $user = new User();
        $user->fullname = 'Nguyễn Nhật Nam';
        $user->email = 'nhatnam@gmail.com';
        $user->username = 'nhatnam';
        $user->password = bcrypt('nhatnam');
        $user->tel = '03455675757';
        $user->save();
    }
}
