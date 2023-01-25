<?php

namespace App\Http\Controllers;

use App\Contracts\Http\Controllers\MovementControllerInterface;
use App\Http\Requests\MovementRequest;
use App\Models\Movement;
use App\Repositories\MovementRepository;
use App\Utils\Constants;
use Illuminate\Http\JsonResponse;

class MovementController implements MovementControllerInterface
{

    /**
     * The Movement repository instance.
     */
    protected $movement;

    /**
     * @param MovementRepository $movement
     */
    public function __construct(MovementRepository $movement)
    {
        $this->movement = $movement;
    }

    /**
     * @return JsonResponse
     */
    function index(): JsonResponse
    {
        return response()->json($this->movement->readAll());
    }

    /**
     * @param Movement $movement
     * @return JsonResponse
     */
    function show(Movement $movement): JsonResponse
    {
        return response()->json($this->movement->readById($movement));
    }

    /**
     * @param MovementRequest $request
     * @return JsonResponse
     */
    function store(MovementRequest $request): JsonResponse
    {
        $movement = $this->movement->create($request);
        return response()->json([
            'Payment Method'=> $movement->id,
            'msg' => Constants::SAVE_SUCCESS
        ]);
    }

    /**
     * @param MovementRequest $request
     * @param $id
     * @return JsonResponse
     */
    function update(MovementRequest $request, $id): JsonResponse
    {
        return response()->json($this->movement->update($request, $id));
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    function destroy($id)
    {
        return response()->json($this->movement->delete($id));
    }
}
