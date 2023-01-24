<?php

namespace App\Models;


class Category extends ModelIncremental
{
    protected $fillable = [
        'name',
        'description',
        'updated_at'
    ];
}
