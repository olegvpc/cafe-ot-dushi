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
        Schema::create('payments', function (Blueprint $table) {
            $table->id()->from(1001);

            $table->string('title');
            $table->text('description');
            $table->boolean('is_daily')->default(true);
            $table->decimal('amount_in')->unsigned()->nullable(); // не отрицательная
            $table->decimal('amount_out')->unsigned()->nullable(); // не отрицательная
            $table->string('image')->nullable();

            $table->timestamp('created_at')->nullable();
            $table->bigInteger('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');

            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('updator_id')->unsigned()->nullable();
            $table->foreign('updator_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
