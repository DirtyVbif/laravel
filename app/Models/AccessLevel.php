<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AccessLevel extends Model
{
    /**
     * override table name for UserStatus model
     */
    protected $table = 'access_levels';
    /**
     * base rewrite fillable fields for UserStatus model
     */
    protected $fillable = [
        'parameters', 'description'
    ];
    /**
     * disable default laravel timestamps for UserStatus model
     */
    public $timestamps = false;
    /**
     * set primary key column name for UserStatus model
     */
    protected $primaryKey = 'alid';

    public static function required(int $level)
    {
        $access = self::all()->where('alid', '=', $level)->first();
        if($access) {
            return explode(',', $access->parameters);
        }
        return [];
    }

    public static function isUserModerator()
    {
        return self::isUserHasLevel(4);
    }

    public static function isUserAdmin()
    {
        return self::isUserHasLevel(5);
    }

    public static function isUserHasLevel(int $level)
    {
        return in_array(UserStatus::current(), self::required($level));
    }
}
