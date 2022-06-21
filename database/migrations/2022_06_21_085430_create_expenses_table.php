<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config("laravel-expense-module.table_prefix") . 'expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");

            if (config("laravel-expense-module.expenses_morphed_by")) {
                $table->nullableMorphs("type");
            }
            $table->string("title")->nullable();
            $table->double("amount", null, 2);
            $table->text("note")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config("laravel-expense-module.table_prefix") . 'expenses');
    }
};
