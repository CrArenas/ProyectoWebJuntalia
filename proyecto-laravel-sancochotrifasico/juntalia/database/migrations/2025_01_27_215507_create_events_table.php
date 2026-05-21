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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('category_id')->constrained();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('city_id')->constrained();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('name');
            $table->string('description');
            $table->datetime('event_date_time');
            $table->enum('age_restriction', ['Todo público','+13', '+16' ,'+18']);
            $table->decimal('cost', 8, 2);
            $table->enum('status', ['Activo', 'Cancelado', 'Aplazado', 'terminado']);
            $table->boolean('pets');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
