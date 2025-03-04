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
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelompok_id')
                ->constrained('kelompoks')
                ->onUpdate('cascade');
            $table->string('NIK');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jk',['Laki-laki','Perempuan']);
            $table->text('alamat');
            $table->string('agama');
            $table->string('status_kawin');
            $table->string('pekerjaan');
            $table->string('pengajuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabahs');
    }
};
