<?php
//lem = laravel expense module
return [
    "table_prefix" => "lem_",
    "expenses_morphed_by" => "type", //if null, then polymorphism won't work in expenses
];
