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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('event_id')->constrained();
            $table->foreign('event_id')->references('id')->on('events');
            $table->text('comment');
            //$table->integer('rating');Lo quite porque no se si es necesario, LO AGREGAMOS??
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
