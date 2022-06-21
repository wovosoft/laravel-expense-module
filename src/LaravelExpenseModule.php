<?php

namespace Wovosoft\LaravelExpenseModule;

use Wovosoft\LaravelExpenseModule\Actions\HasCategoryActions;
use Wovosoft\LaravelExpenseModule\Actions\HasExpenseActions;
use Wovosoft\LaravelExpenseModule\Enums\Actions;

class LaravelExpenseModule
{
    /**
     * Traits cannot be return type
     * @param Actions $action
     * @return HasCategoryActions|HasExpenseActions
     */
    public function actions(Actions $action)
    {
        /**
         * Dynamically building class and using traits
         */
        return match ($action) {
            Actions::Expenses => new (new class {
                use HasExpenseActions;
            }),
            Actions::Categories => new (new class {
                use HasCategoryActions;
            })
        };
    }
}

