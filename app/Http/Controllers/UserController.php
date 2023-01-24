<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserUserRepository;
use App\Utils\Constants;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * The user repository instance.
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @param \App\Repositories\UserUserRepository  $users
     * @return void
     */
    public function __construct(UserUserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->users->readAll());
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return response()->json($this->users->readById($user));
    }

    /**
     * @param UserRequest $data
     * @return JsonResponse
     */
    public function store(UserRequest $data): JsonResponse
    {
        $user = $this->users->create($data);
        return response()->json([
            '$user'=> $user->id,
            'msg' => Constants::SAVE_SUCCESS
        ]);
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UserRequest $request, $id): JsonResponse
    {
        return response()->json($this->users->update($request, $id));
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        return response()->json($this->users->delete($id));
    }
}
