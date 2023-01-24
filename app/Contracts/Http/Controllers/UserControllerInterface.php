<?php

namespace App\Contracts\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

interface UserControllerInterface extends ControllerInterface
{
    function index();
    function show(User $user);
    function store(UserRequest $data);
    function update(UserRequest $request, $id);
    function destroy($id);
}
