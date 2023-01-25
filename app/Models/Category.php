<?php

namespace App\Models;


class Category extends ModelIncremental
{
    protected $fillable = [
        'name',
        'description',
        'updated_at'
    ];

    public function movements()
    {
        return $this->belongsTo(Movement::class, 'id', 'type_id');
    }
}
