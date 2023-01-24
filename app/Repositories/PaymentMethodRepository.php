<?php

namespace App\Repositories;

use App\Contracts\Repositories\PaymentMethodRepositoryInterface;
use App\Models\PaymentMethod;
use App\Utils\Constants;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PaymentMethodRepository implements PaymentMethodRepositoryInterface
{
    /**
     * Creates a new category with default password
     * @param $data
     * @return mixed
     */
    public function create($data): PaymentMethod
    {
        $paymentMethod = PaymentMethod::firstOrNew($data->all());
        $paymentMethod->save();
        return $paymentMethod;
    }

    /**
     * Returns a list of all categorys
     * @return Collection|PaymentMethod[]
     */
    public function readAll(): Collection|PaymentMethod
    {
        return PaymentMethod::all();
    }

    /**
     * Returns the category according to the passed id.
     * @param PaymentMethod $paymentMethod
     * @return mixed
     */
    public function readById(PaymentMethod $paymentMethod): PaymentMethod
    {
        return PaymentMethod::findOrFail($paymentMethod->getKey());
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id): PaymentMethod
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        DB::transaction(fn() => $paymentMethod->fill($data->all())->save());
        return $paymentMethod;
    }

    /**
     * Removes a category by 'logical deletion'.
     * @return string[]
     */
    public function delete($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        if (!$paymentMethod) {
            return ['error'=> Constants::DELETE_FAIL];
        }
        $paymentMethod->delete();
        return ['id' => $paymentMethod->id, 'message'=> Constants::DELETE_SUCCESS];
    }
}
