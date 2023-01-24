<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Models\Category;
use App\Utils\Constants;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Creates a new category with default password
     * @param $data
     * @return mixed
     */
    public function create($data): Category
    {
        $category = Category::firstOrNew($data->all());
        $category->save();
        return $category;
    }

    /**
     * Returns a list of all categorys
     * @return Collection|Category[]
     */
    public function readAll(): Collection|Category
    {
        return Category::all();
    }

    /**
     * Returns the category according to the passed id.
     * @param Category $category
     * @return mixed
     */
    public function readById(Category $category): Category
    {
        return Category::findOrFail($category->getKey());
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id): Category
    {
        $category = Category::findOrFail($id);
        DB::transaction(fn() => $category->fill($data->all())->save());
        return $category;
    }

    /**
     * Removes a category by 'logical deletion'.
     * @param Category $id
     * @return string[]
     */
    public function delete(Category $category)
    {
        if (!$category) {
            return ['error'=> Constants::DELETE_FAIL];
        }
        $category->delete();
        return ['id' => $category->id, 'message'=> Constants::DELETE_SUCCESS];
    }
}
