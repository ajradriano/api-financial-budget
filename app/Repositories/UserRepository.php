<?php

namespace App\Repositories;

use App\Models\User;
use App\Utils\Constants;
use Faker\Core\Uuid;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository
{
    /**
     * Creates a new user with default password
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $user = User::firstOrNew($data->all());
        $user->id = Str::uuid();
        $user->password = Hash::make('finab@123', [ 'rounds' => 12 ]);
        $user->save();
        return $user->id;
    }

    /**
     * Returns a list of all users
     * @return Collection|User[]
     */
    public function readAll(): Collection|User
    {
        return User::all();
    }

    /**
     * Returns the user according to the passed id.
     * @param User $user
     * @return mixed
     */
    public function readById(User $user): User
    {
        return User::findOrFail($user->getKey());
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id): User
    {
        $user = User::findOrFail($id);
        if ($data['password']) {
            $data['password'] = Hash::make($data['password'], [ 'rounds' => 12 ]);
        }
        DB::transaction(fn() => $user->fill($data->all())->save());
        return $user;
    }

    /**
     * Removes a user by 'logical deletion'.
     * @param User $id
     * @return string[]
     */
    public function delete(User $user)
    {
        if (!$user) {
            return ['error'=> Constants::DELETE_FAIL];
        }
        $user->delete();
        return ['id' => $user->id, 'message'=> Constants::DELETE_SUCCESS];
    }
}
