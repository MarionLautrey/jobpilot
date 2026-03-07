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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom')->after('nom');
            $table->string('email')->unique()->after('prenom');
            $table->string('telephone')->nullable()->after('email');
            $table->string('adresse')->nullable()->after('telephone');
            $table->date('date_naissance')->nullable()->after('adresse');
            $table->text('description')->nullable()->after('date_naissance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
