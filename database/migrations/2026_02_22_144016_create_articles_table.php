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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type')->default('article'); // ← article | white-paper
            $table->string('category')->nullable();        // ← tambah
            $table->text('excerpt')->nullable();           // ← tambah
            $table->json('target_audience')->nullable();   // ← tambah
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $table->enum('source_type', ['editor', 'pdf']);
            $table->longText('content')->nullable();
            $table->string('pdf_path')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('page_count')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
