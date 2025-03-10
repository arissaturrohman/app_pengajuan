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
        Schema::create('detail_kelompoks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelompok_id')
                ->constrained('kelompoks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('nasabah_id')
                ->constrained('nasabahs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kelompoks');
    }
};
