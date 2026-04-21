<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_attendances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->constrained('events')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Catatan / pertanyaan dari user
            $table->text('notes')->nullable();

            // Tipe registrasi: interest | confirmed | waitlist
            $table->string('registration_type')->default('interest');
            // Status: 0=pending, 1=approved, 2=rejected, 3=cancelled
            $table->tinyInteger('status')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_attendances');
    }
};