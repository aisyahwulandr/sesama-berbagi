<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('program_details', function (Blueprint $table) {
            $table->id();
            $table->string('cover_image')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('fundraiser_name');
            $table->string('fundraiser_organization');
            $table->enum('status', ['Sedang Berlangsung', 'Pencairan Dana', 'Proses Penyaluran', 'Telah Disalurkan'])->default('Sedang Berlangsung');
            $table->json('status_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_details');
    }
};
