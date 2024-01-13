<?php

namespace App\Http\Controllers;

use App\Contracts\Http\Controllers\UserControllerInterface;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Utils\Constants;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;


class UserController extends Controller implements UserControllerInterface
{
    /**
     * The user repository instance.
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    
        // Aplica o middleware JWT às rotas protegidas desta controladora
        $this->middleware('jwt.auth', ['except' => ['index', 'show']]);
    }
    

    public function index(): JsonResponse
    {
        return response()->json($this->users->readAll());
    }

    public function show(User $user): JsonResponse
    {
        return response()->json($this->users->readById($user));
    }

    public function store(UserRequest $data): JsonResponse
    {
        $user = $this->users->create($data);
        return response()->json([
            'User'=> $user->id,
            'msg' => Constants::SAVE_SUCCESS
        ]);
    }

    public function update(UserRequest $request, $id): JsonResponse
    {
        return response()->json($this->users->update($request, $id));
    }

    public function destroy($id)
    {
        return response()->json($this->users->delete($id));
    }
}
