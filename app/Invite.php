<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    public function tracks()
    {
        return $this->hasMany('App\Track');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function reminders()
    {
        return $this->hasMany('App\Reminder');
    }
}
