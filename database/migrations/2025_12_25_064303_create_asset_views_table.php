<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asset_views', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id')->nullable();
            $table->unsignedBigInteger('article_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('view_date');
            $table->timestamps();

            $table->unique(['asset_id', 'user_id', 'view_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asset_views');
    }
};
