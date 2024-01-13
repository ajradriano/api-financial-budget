<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movement extends ModelUUID
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'user_id',
        'category_id',
        'type_id',
        'payment_method_id',
        'description',
        'value',
        'due_date',
        'pay_day',
        'updated_at'
    ];

    public function type()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function payment_method()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'payment_method_id');
    }

}
