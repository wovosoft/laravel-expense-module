<?php

namespace Wovosoft\LaravelExpenseModule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Wovosoft\LaravelExpenseModule\Traits\HasTablePrefix;

class Expense extends Model
{
    use HasFactory, HasTablePrefix;

    public static function rules(): array
    {
        return [
            "category_id" => ["numeric", "required"],
            "title" => ["string", "nullable"],
            "amount" => ["numeric"],
            "note" => ["string", "nullable"],
            config("laravel-expense-module.expenses_morphed_by") => ["string", "nullable"]
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function typeable(): MorphTo
    {
        return $this->morphTo(config("laravel-expense-module.expenses_morphed_by"));
    }
}
