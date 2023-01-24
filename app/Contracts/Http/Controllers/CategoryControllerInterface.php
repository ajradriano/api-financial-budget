<?php

namespace App\Contracts\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

interface CategoryControllerInterface extends ControllerInterface
{
    function index();
    function show(Category $category);
    function store(CategoryRequest $data);
    function update(CategoryRequest $request, $id);
    function destroy($id);
}
