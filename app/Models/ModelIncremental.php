<?php

namespace App\Models;

class ModelIncremental extends Model
{
    public $incrementing = true;
    public $keyType = 'int';
}
