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
        Schema::create('diseases', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Add a 'name' column for the treatment name
            $table->unsignedBigInteger('treatment_id');
            $table->foreign('treatment_id')->references('id')->on('treatments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diseases', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
        });
        Schema::dropIfExists('diseases');
    }
};
