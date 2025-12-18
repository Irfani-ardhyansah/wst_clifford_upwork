<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('industry_id')
                    ->constrained('industries')
                    ->onDelete('cascade'); 
            
            $table->string('title'); 
            $table->string('slug');
            $table->string('category')->nullable();
            
            $table->string('impact_highlight')->nullable(); 
            
            $table->string('image_path')->nullable();
            $table->string('link_url')->nullable(); 
            
            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(false); 
            $table->boolean('is_active')->default(true);
            
            $table->unique(['industry_id', 'slug']); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};