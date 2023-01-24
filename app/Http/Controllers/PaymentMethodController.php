<?php

namespace App\Http\Controllers;

use App\Contracts\Http\Controllers\PaymentMethodControllerInterface;
use App\Http\Requests\PaymentMethodRequest;
use App\Models\PaymentMethod;
use App\Repositories\PaymentMethodRepository;
use App\Utils\Constants;
use Illuminate\Http\JsonResponse;

class PaymentMethodController implements PaymentMethodControllerInterface
{

    /**
     * The category repository instance.
     */
    protected $paymentMethod;

    /**
     * @param PaymentMethodRepository $paymentMethod
     */
    public function __construct(PaymentMethodRepository $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return JsonResponse
     */
    function index(): JsonResponse
    {
        return response()->json($this->paymentMethod->readAll());
    }

    /**
     * @param PaymentMethod $paymentMethod
     * @return JsonResponse
     */
    function show(PaymentMethod $paymentMethod): JsonResponse
    {
        return response()->json($this->paymentMethod->readById($paymentMethod));
    }

    /**
     * @param PaymentMethodRequest $data
     * @return JsonResponse
     */
    function store(PaymentMethodRequest $data): JsonResponse
    {
        $paymentMethod = $this->paymentMethod->create($data);
        return response()->json([
            'Payment Method'=> $paymentMethod->id,
            'msg' => Constants::SAVE_SUCCESS
        ]);
    }

    /**
     * @param PaymentMethodRequest $request
     * @param $id
     * @return JsonResponse
     */
    function update(PaymentMethodRequest $request, $id): JsonResponse
    {
        return response()->json($this->paymentMethod->update($request, $id));
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    function destroy($id)
    {
        return response()->json($this->paymentMethod->delete($id));
    }
}
