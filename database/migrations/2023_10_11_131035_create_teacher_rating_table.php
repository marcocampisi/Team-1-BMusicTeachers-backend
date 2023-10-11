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
        Schema::create('teacher_rating', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rating_id')->nullable();
            $table->foreign('rating_id')
                ->references('id')
                ->on('ratings')
                ->onUpdate('cascade')//decidere
                ->onDelete('set null'); //decidere
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onUpdate('cascade')//decidere
                ->onDelete('set null');//decidere
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_rating');
    }
};
