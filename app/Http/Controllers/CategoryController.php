<?php

namespace App\Http\Controllers;

use App\Contracts\Http\Controllers\ControllerInterface;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Utils\Constants;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController implements ControllerInterface
{
    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    function index(): JsonResponse
    {
        return response()->json($this->categories->readAll());
    }

    function show(Category $category): JsonResponse
    {
        return response()->json($this->categories->readById($category));
    }

    function store(CategoryRequest $data): JsonResponse
    {
        $category = $this->categories->create($data);
        return response()->json([
            'Category'=> $category->id,
            'msg' => Constants::SAVE_SUCCESS
        ]);
    }

    function update(CategoryRequest $request, $id): JsonResponse
    {
        return response()->json($this->categories->update($request, $id));
    }

    function destroy($id)
    {
        return response()->json($this->categories->delete(Category::find($id)));
    }
}
