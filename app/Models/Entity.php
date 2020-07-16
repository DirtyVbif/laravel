<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    /**
     * set primary key column name for News model
     */
    protected $primaryKey = 'entid';
    /**
     * base rewrite fillable fields for News model
     */
    protected $fillable = [
        'entity_type_id'
    ];
    /**
     * disable default laravel timestamps for News model
     */
    public $timestamps = false;
    /**
     * add relationships to Category model
     */
    protected $with = [
        'entityType'
    ];

    public function entityType()
    {
        return $this->hasOne(EntityType::class, 'entity_type_id', 'entity_type_id');
    }

    public static function new(string $type)
    {
        $entity = new self;
        $entity->fill(['entity_type_id' => EntityType::getIdOf($type)]);
        $entity->save();
        return $entity->entid;
    }
}
