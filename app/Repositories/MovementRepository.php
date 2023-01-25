<?php

namespace App\Repositories;

use App\Contracts\Repositories\MovementRepositoryInterface;
use App\Models\Movement;
use App\Utils\Constants;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MovementRepository implements MovementRepositoryInterface
{
    /**
     * Creates a new Movement with default password
     * @param $data
     * @return mixed
     */
    public function create($data): Movement
    {
        $movement = Movement::firstOrNew($data->all());
        $movement->id = Str::uuid();
        $movement->save();
        return $movement;
    }

    /**
     * Returns a list of all Movements
     * @return Collection|Movement[]
     */
    public function readAll(): Collection|Movement
    {
        return Movement::all();
    }

    /**
     * Returns the Movement according to the passed id.
     * @param Movement $data
     * @return mixed
     */
    public function readById(Movement $data): Collection|Movement
    {
        $movement_id = $data->getKey();
        $movement = Movement::where('id', $movement_id)->with(['type:id,name', 'category:id,name', 'payment_method:id,name'])->get();
        return $movement;
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id): Movement
    {
        $movement = Movement::findOrFail($id);
        DB::transaction(fn() => $movement->fill($data->all())->save());
        return $movement;
    }

    /**
     * Removes a Movement by 'logical deletion'.
     * @return string[]
     */
    public function delete($id)
    {
        $movement = Movement::find($id);
        if (!$movement) {
            return ['error'=> Constants::DELETE_FAIL];
        }
        $movement->delete();
        return ['id' => $movement->id, 'message'=> Constants::DELETE_SUCCESS];
    }
}
