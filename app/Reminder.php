<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    public function invite()
    {
        return $this->belongsTo('App\Invite');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
