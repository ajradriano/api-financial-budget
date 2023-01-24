<?php

namespace App\Models;


class Type extends ModelIncremental
{
    protected $fillable = [
        'name',
        'description',
        'updated_at'
    ];
}
