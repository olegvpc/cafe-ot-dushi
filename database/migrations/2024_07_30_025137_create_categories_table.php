<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. Сатегории меню: Напиток Десерт Салат ...
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->string('id')->unique(); // Строковое значение которое будет отражаться в каждом меню
            $table->timestamps();

            $table->string('name');
            $table->integer('sort')->unsigned()->default(999);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
