<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\UserRequest;
use App\Models\User;

interface UserRepositoryInterface extends Repository
{
    public function create(UserRequest $request);
    public function readAll();
    public function readById(User $user);
    public function update(UserRequest $data, $id);
    public function delete(User $user);
}
