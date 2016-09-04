<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;

    public function author()
    {
        return $this->hasOne('\App\Author');
    }

    public function admin()
    {
        return $this->hasOne('\App\Admin');
    }

    public function is_author()
    {
        return $this->author ? 1 : 0;
    }

    public function is_admin()
    {
        return $this->is_admin ? 1 : 0;
    }

    public function formatBirth($separate = null)
    {
        if (!$separate)
            $separate = '/';
        return date_format(date_create($this->birth), "Y" . $separate . "m" . $separate . "d");
    }

    public function age()
    {
        $birth =  date('Y', strtotime($this->birth));
        $now = date('Y');
        return $now - $birth;
    }
}
