<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    public function invite()
    {
        return $this->belongsTo('App\Invite');
    }
}
