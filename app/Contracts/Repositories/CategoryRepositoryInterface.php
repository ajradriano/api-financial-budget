<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

interface CategoryRepositoryInterface extends Repository
{
    public function create(CategoryRequest $request);
    public function readAll();
    public function readById(Category $category);
    public function update(CategoryRequest $data, $id);
    public function delete(Category $category);
}
