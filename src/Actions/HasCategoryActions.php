<?php

namespace Wovosoft\LaravelExpenseModule\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Wovosoft\LaravelExpenseModule\Helpers\Data;
use Wovosoft\LaravelExpenseModule\Models\Category;

trait HasCategoryActions
{
    /**
     * @throws \Throwable
     */
    public function store(Request $request): JsonResponse
    {
        return Data::store(new Category(), $request);
    }

    /**
     * @throws \Throwable
     */
    public function update(Category $category, Request $request): JsonResponse
    {
        return Data::store($category, $request);
    }

    /**
     * @throws \Throwable
     */
    public function destroy(Category $category): JsonResponse
    {
        return Data::destroy($category);
    }

    public function find(Category $category): string
    {
        return $category->toJson();
    }

    public function index(Request $request): LengthAwarePaginator
    {
        return Data::paginate(Category::query(), $request);
    }

    public function options(Request $request): Collection|array
    {
        return Data::options(Category::query(), $request);
    }

    public function expenses(Category $category, Request $request): Collection|array
    {
        return Data::options($category->expenses()->getQuery(), $request);
    }
}
