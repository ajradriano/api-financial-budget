<?php

namespace App\Http\Controllers;

use App\Contracts\Http\Controllers\ControllerInterface;
use App\Http\Requests\TypeRequest;
use App\Models\Type;
use App\Repositories\TypeRepository;
use App\Utils\Constants;
use Illuminate\Http\JsonResponse;

class TypeController implements ControllerInterface
{

    /**
     * The category repository instance.
     */
    protected $types;

    /**
     * @param TypeRepository $types
     */
    public function __construct(TypeRepository $types)
    {
        $this->types = $types;
    }

    /**
     * @return JsonResponse
     */
    function index(): JsonResponse
    {
        return response()->json($this->types->readAll());
    }

    /**
     * @param Type $type
     * @return JsonResponse
     */
    function show(Type $type): JsonResponse
    {
        return response()->json($this->types->readById($type));
    }

    /**
     * @param TypeRequest $data
     * @return JsonResponse
     */
    function store(TypeRequest $data): JsonResponse
    {
        $type = $this->types->create($data);
        return response()->json([
            'Type'=> $type->id,
            'msg' => Constants::SAVE_SUCCESS
        ]);
    }

    /**
     * @param TypeRequest $request
     * @param $id
     * @return JsonResponse
     */
    function update(TypeRequest $request, $id): JsonResponse
    {
        return response()->json($this->types->update($request, $id));
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    function destroy($id)
    {
        return response()->json($this->types->delete($id));
    }
}
