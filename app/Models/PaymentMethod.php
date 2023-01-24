<?php

namespace App\Models;


class PaymentMethod extends ModelIncremental
{
    protected $fillable = [
        'name',
        'description',
        'updated_at'
    ];
}
