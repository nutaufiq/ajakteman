<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function get_email_name($email)
    {
        $parts = explode("@", $email);
        $name = $parts[0];

        return $name;
    }

    public function count_remaining($olx_id)
    {
        //pasang iklan
        $friends = \App\User::where('referrer_olx_id', $olx_id)->get();
        $count_ads_success = 0;

        foreach($friends as $friend)
        {
            if($friend->ads !== null)
            {
                if($friend->ads->is_active == 1 && $friend->ads->is_verified == 1)
                {
                    $count_ads_success++;
                }
            }
        }

        //jumlah voucher yang bisa ditukar
        $count_voucher = (int) floor($count_ads_success/3);

        //kebutuhan tambahan teman pasang iklan
        $count_remaining = 3 - (int) floor($count_ads_success%3);

        return $count_remaining;
    }

    public function ads()
    {
        return $this->hasOne('App\Ad');
    }

    public function invite()
    {
        return $this->hasOne('App\Invite');
    }

    public function redeems()
    {
        return $this->hasMany('App\Redeem');
    }

    public function reminders()
    {
        return $this->hasMany('App\Reminders');
    }
}
