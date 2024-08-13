<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->string('id')->unique();// Строковое значение которое будет отражаться в каждом Order
            $table->timestamps();
            $table->boolean('is_free')->default(true);
            $table->string('order_id')->nullable();

            $table->integer('sort')->unsigned(); // сортировка - не отрицательное
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
