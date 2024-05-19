<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kk');
            $table->string('image')->nullable();
            $table->string('full_name');
            $table->bigInteger('nik')->unique();
            $table->date('birth_date');
            $table->string('gender');
            $table->string('blood')->nullable();
            $table->string('religion')->nullable();
            $table->string('status')->nullable();
            $table->string('profession')->nullable();
            $table->string('note')->nullable();
            $table->enum('condition', ['Sejahtera', 'Pra Sejahtera'])->nullable();
            $table->string('numbers')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->bigInteger('head_kk')->nullable();
            $table->string('cities_v2')->nullable();
            $table->string('provinsi_v2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
