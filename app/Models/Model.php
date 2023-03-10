<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class Model extends EloquentModel
{
    use SoftDeletes;
}
