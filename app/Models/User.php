<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'usid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * add relationships to User model
     */
    protected $with = [
      'userStatus'
    ];

    public function userStatus()
    {
        return $this->hasOne(UserStatus::class, 'usid', 'usid');
    }

    public static function all($columns = ['*'])
    {
        $all = parent::all($columns);
        foreach ($all as $item) {
            $item->status = $item->relations['userStatus']->status;
        }
        return $all;
    }
}
