<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\PaymentMethodRequest;
use App\Models\PaymentMethod;

interface PaymentMethodRepositoryInterface extends Repository
{
    public function create(PaymentMethodRequest $request);
    public function readAll();
    public function readById(PaymentMethod $paymentMethod);
    public function update(PaymentMethodRequest $data, $id);
    public function delete(PaymentMethod $paymentMethod);
}
