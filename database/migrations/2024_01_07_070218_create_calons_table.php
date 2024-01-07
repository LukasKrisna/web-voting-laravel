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
        Schema::create('calons', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nama_ketua');
            $table->string('nama_wakil');
            $table->string('foto_calon', 250);
            $table->text('visi');
            $table->text('misi');
            $table->integer('suara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calons');
    }
};
