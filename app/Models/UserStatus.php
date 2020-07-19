<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserStatus extends Model
{
    /**
     * default status for unauthorized users
     */
    public const DEFAULT_STATUS = 'anonymous';
    /**
     * override table name for UserStatus model
     */
    protected $table = 'user_statuses';
    /**
     * base rewrite fillable fields for UserStatus model
     */
    protected $fillable = [
        'status'
    ];
    /**
     * disable default laravel timestamps for UserStatus model
     */
    public $timestamps = false;
    /**
     * set primary key column name for UserStatus model
     */
    protected $primaryKey = 'usid';

    public static function current()
    {
        $user = Auth::user();
        if($user && isset($user->relations['userStatus'])) {
            return $user->relations['userStatus']->status;
        }
        return self::DEFAULT_STATUS;
    }
}
