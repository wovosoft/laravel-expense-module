<?php

namespace Wovosoft\LaravelExpenseModule\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelExpenseModule extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-expense-module';
    }
}
