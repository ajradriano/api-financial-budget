<?php

namespace App\Http\Controllers;

use App\Contracts\Http\Controllers\MovementControllerInterface;
use App\Http\Requests\MovementRequest;
use App\Models\Movement;
use App\Repositories\MovementRepository;
use App\Utils\Constants;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


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

public function cadastro($id = null)
    {
        // Inicialize a variável $registro
        $registro = null;

        // Se um ID for fornecido, carregue os dados do registro existente
        if ($id) {
            $registro = Movement::findOrFail($id);
        }

        // Se for uma requisição da API, retorne os dados em JSON
        if (request()->wantsJson()) {
            return response()->json($registro);
        }

        // Se for uma solicitação da web, exiba a view

        $categories = DB::table("categories")->whereNull('deleted_at')->get();
        $types = DB::table("types")->whereNull('deleted_at')->get();
        $paymentMethods = DB::table("payment_methods")->whereNull('deleted_at')->get();
        return view('movements-registration', [
            'categories' => $categories,
            'types' => $types,
            'paymentMethods' => $paymentMethods,
        ]);
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
    function teste() {
        Alert::alert('Title', 'Message');
    }
}
