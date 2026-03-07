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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('adresse')->nullable()->after('nom');
            $table->string('job')->nullable()->after('adresse');   
            $table->date('date')->nullable()->after('job');
            $table->string('type')->after('date');         
            $table->unsignedBigInteger('entreprise_id');
            $table->unsignedBigInteger('candidat_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
