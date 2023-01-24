<?php

namespace App\Http\Controllers;

use App\Contracts\Http\Controllers\ControllerInterface;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Utils\Constants;
use Illuminate\Http\JsonResponse;

class CategoryController implements ControllerInterface
{

    /**
     * The category repository instance.
     */
    protected $categories;

    /**
     * @param CategoryRepository $categories
     */
    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return JsonResponse
     */
    function index(): JsonResponse
    {
        return response()->json($this->categories->readAll());
    }

    /**
     * @param Category $category
     * @return JsonResponse
     */
    function show(Category $category): JsonResponse
    {
        return response()->json($this->categories->readById($category));
    }

    /**
     * @param CategoryRequest $data
     * @return JsonResponse
     */
    function store(CategoryRequest $data): JsonResponse
    {
        $category = $this->categories->create($data);
        return response()->json([
            'Category'=> $category->id,
            'msg' => Constants::SAVE_SUCCESS
        ]);
    }

    /**
     * @param CategoryRequest $request
     * @param $id
     * @return JsonResponse
     */
    function update(CategoryRequest $request, $id): JsonResponse
    {
        return response()->json($this->categories->update($request, $id));
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    function destroy($id)
    {
        return response()->json($this->categories->delete($id));
    }
}
