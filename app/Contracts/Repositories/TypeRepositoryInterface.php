<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\TypeRequest;
use App\Models\Type;

interface TypeRepositoryInterface extends Repository
{
    public function create(TypeRequest $request);
    public function readAll();
    public function readById(Type $type);
    public function update(TypeRequest $data, $id);
    public function delete(Type $type);
}
