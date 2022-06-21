<?php

namespace Wovosoft\LaravelExpenseModule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Wovosoft\LaravelExpenseModule\Traits\HasTablePrefix;

class Category extends Model
{
    use HasFactory, HasTablePrefix;

    public static function rules(): array
    {
        return [
            "title" => ["string", "required"],
            "description" => ["string", "nullable"]
        ];
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }
}
