<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityUrlAlias extends Model
{
    /**
     * base rewrite fillable fields for Category model
     */
    protected $fillable = [
        'entid', 'alias'
    ];
    /**
     * disable default laravel timestamps for Category model
     */
    public $timestamps = false;
    /**
     * set primary key column name for Category model
     */
    protected $primaryKey = 'entid';
    /**
     * change primary key AI setting for Category model
     */
    public $incrementing = false;
}
