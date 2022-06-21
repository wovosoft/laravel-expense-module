<?php

namespace Wovosoft\LaravelExpenseModule\Assets;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Wovosoft\LaravelExpenseModule\Models\Expense;

class Reports
{
    public function ranged(string|Carbon $from, string|Carbon|null $to = null)
    {
        return Expense::query()
            ->when($from && $to, function (Builder $builder) use ($from, $to) {
                $builder->whereBetween("created_at", [$from, $to]);
            })
            ->when($from && !$to, function (Builder $builder, $from) {
                $builder->where("created_at", ">=", $from);
            });
    }
}
