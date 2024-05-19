<?php

use App\Models\Biodata;
use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->string('sub_district');
            $table->string('regency');
            $table->foreignIdFor(City::class)->nullable();
            $table->foreignIdFor(Province::class)->nullable();
            $table->foreignIdFor(Biodata::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
