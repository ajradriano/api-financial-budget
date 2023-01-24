<?php

namespace App\Contracts\Http\Controllers;

use App\Http\Requests\PaymentMethodRequest;
use App\Models\PaymentMethod;

interface PaymentMethodControllerInterface extends ControllerInterface
{
    function index();
    function show(PaymentMethod $paymentMethod);
    function store(PaymentMethodRequest $data);
    function update(PaymentMethodRequest $request, $id);
    function destroy($id);
}
