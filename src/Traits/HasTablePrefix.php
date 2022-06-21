<?php

namespace Wovosoft\LaravelExpenseModule\Traits;

trait HasTablePrefix
{
    public function getTable(): string
    {
        if (config("laravel-expense-module.table_prefix")) {
            return config("laravel-expense-module.table_prefix") . parent::getTable();
        }
        return parent::getTable();
    }
}
