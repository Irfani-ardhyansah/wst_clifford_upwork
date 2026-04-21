<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            // Konten utama
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            // Waktu & Tempat
            $table->date('event_date');
            $table->time('event_time')->nullable();
            $table->string('location')->nullable();
            $table->boolean('is_virtual')->default(false);

            // Kategori & Tipe
            // conference | workshop | speaking_engagement | webinar | other
            $table->string('event_type')->default('conference');

            // Badge bawah kiri kartu (ATTENDING | PRESENTING | SPEAKING | null)
            $table->string('attendance_status')->nullable();
            // Sub-label badge (SPEAKING OPPORTUNITY PURSUED | WST GRESB PARTNER | dll)
            $table->string('attendance_label')->nullable();

            // Visual
            $table->string('image_path')->nullable();
            $table->boolean('is_featured')->default(false); // kartu gelap
            $table->string('external_url')->nullable();     // link register eksternal

            // Status
            // 0=inactive, 1=active/upcoming, 2=past event
            $table->tinyInteger('status')->default(1);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};