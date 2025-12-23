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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('industry_id')->nullable()->constrained('industries')->nullOnDelete();
            
            $table->string('title');
            $table->string('slug')->unique();
            
            // Kategori dibuat ENUM atau String biasa agar bisa difilter
            // Pilihan: 'Case Study', 'Webinar', 'White Paper'
            $table->string('category'); 
            $table->string('tags')->nullable();
            $table->text('description')->nullable();
            $table->string('video_path')->nullable();
            $table->longText('html_content')->nullable(); 
            $table->string('image_path')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
