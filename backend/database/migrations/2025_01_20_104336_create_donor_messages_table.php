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
    Schema::create('donate_messages', function (Blueprint $table) {
        $table->id();
        $table->foreignId('program_id')->constrained('program_details')->onDelete('cascade');
        $table->string('donor_name');
        $table->text('message');
        $table->timestamp('sent_at');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donate_messages');
    }
};
