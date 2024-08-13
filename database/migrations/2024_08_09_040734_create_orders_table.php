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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->json('menus')->nullable();
            $table->decimal('total_amount')->unsigned()->default(0);
            $table->string('table_id');
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->boolean('accepted')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('done')->nullable();
            $table->timestamp('done_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
