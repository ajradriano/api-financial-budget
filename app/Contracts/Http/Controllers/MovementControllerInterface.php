<?php

namespace App\Contracts\Http\Controllers;

use App\Http\Requests\MovementRequest;
use App\Models\Movement;

interface MovementControllerInterface extends ControllerInterface
{
    function index();
    function show(Movement $paymentMethod);
    function store(MovementRequest $request);
    function update(MovementRequest $request, $id);
    function destroy($id);
}
