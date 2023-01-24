<?php

namespace App\Repositories;

use App\Contracts\Repositories\TypeRepositoryInterface;
use App\Models\Type;
use App\Utils\Constants;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TypeRepository implements TypeRepositoryInterface
{
    /**
     * Creates a new Type
     * @param $data
     * @return mixed
     */
    public function create($data): Type
    {
        $type = Type::firstOrNew($data->all());
        $type->save();
        return $type;
    }

    /**
     * Returns a list of all Types
     * @return Collection|Type[]
     */
    public function readAll(): Collection|Type
    {
        return Type::all();
    }

    /**
     * Returns the Type according to the passed id.
     * @param Type $type
     * @return mixed
     */
    public function readById(Type $type): Type
    {
        return Type::findOrFail($type->getKey());
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id): Type
    {
        $type = Type::findOrFail($id);
        DB::transaction(fn() => $type->fill($data->all())->save());
        return $type;
    }

    /**
     * Removes a Type by 'logical deletion'.
     * @return string[]
     */
    public function delete($id)
    {
        $type = Type::find($id);
        if (!$type) {
            return ['error'=> Constants::DELETE_FAIL];
        }
        $type->delete();
        return ['id' => $type->id, 'message'=> Constants::DELETE_SUCCESS];
    }
}
