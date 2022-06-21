<?php

namespace Wovosoft\LaravelExpenseModule\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Wovosoft\LaravelCommon\Helpers\Data;
use Wovosoft\LaravelExpenseModule\Models\Expense;

trait HasExpenseActions
{
    /**
     * @throws \Throwable
     */
    public function store(Request $request): JsonResponse
    {
        return Data::store(new Expense(), $request);
    }

    /**
     * @throws \Throwable
     */
    public function update(Expense $expense, Request $request): JsonResponse
    {
        return Data::store($expense, $request);
    }

    /**
     * @throws \Throwable
     */
    public function destroy(Expense $expense): JsonResponse
    {
        return Data::destroy($expense);
    }

    public function find(Expense $expense): string
    {
        return $expense->toJson();
    }

    public function index(Request $request): LengthAwarePaginator
    {
        return Data::paginate(Expense::query(), $request);
    }

    public function options(Request $request): Collection|array
    {
        return Data::options(Expense::query(), $request);
    }
}
