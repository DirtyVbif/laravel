<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityType extends Model
{
    /**
     * set primary key column name for EntityType model
     */
    protected $primaryKey = 'entity_type_id';
    /**
     * base rewrite fillable fields for EntityType model
     */
    protected $fillable = [
        'name', 'source_table', 'human_name', 'description'
    ];
    /**
     * disable default laravel timestamps for EntityType model
     */
    public $timestamps = false;
    /**
     * change primary key type for EntityType model
     */
    protected $keyType = 'tinyint';

    public static function getIdOf(string $entity_type_name)
    {
        return self::all()->where('name', '=', $entity_type_name)->first()->entity_type_id;
    }
}
