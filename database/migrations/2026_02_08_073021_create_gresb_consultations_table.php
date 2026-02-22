<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('gresb_consultations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('company');
            $table->string('phone')->nullable();
            $table->integer('portfolio_size')->nullable();
            $table->string('interest')->nullable();
            $table->dateTime('time_preference')->nullable();
            $table->text('notes')->nullable();
            $table->itneger('status')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('gresb_consultations');
    }
};