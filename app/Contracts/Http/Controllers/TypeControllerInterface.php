<?php

namespace App\Contracts\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;

interface TypeControllerInterface extends ControllerInterface
{
    function index();
    function show(Type $type);
    function store(TypeRequest $data);
    function update(TypeRequest $request, $id);
    function destroy($id);
}
