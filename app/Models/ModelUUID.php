<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ModelUUID extends Model
{
    public $incrementing = false;
    public $keyType = 'string';
}
