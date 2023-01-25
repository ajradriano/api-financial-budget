<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\MovementRequest;
use App\Models\Movement;

interface MovementRepositoryInterface extends Repository
{
    public function create(MovementRequest $request);
    public function readAll();
    public function readById(Movement $movement);
    public function update(MovementRequest $data, $id);
    public function delete(Movement $movement);

}
