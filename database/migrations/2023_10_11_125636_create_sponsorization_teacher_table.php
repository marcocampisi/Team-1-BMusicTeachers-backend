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
        Schema::create('sponsorization_teacher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sponsorization_id')->nullable();
            $table->foreign('sponsorization_id')
                ->references('id')
                ->on('sponsorizations')
                ->onUpdate('cascade')//decidere
                ->onDelete('set null'); //decidere
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onUpdate('cascade')//decidere
                ->onDelete('set null');//decidere
            $table->dateTime('sponsored_start');
            $table->dateTime('sponsored_until');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorization_teacher');
    }
};
