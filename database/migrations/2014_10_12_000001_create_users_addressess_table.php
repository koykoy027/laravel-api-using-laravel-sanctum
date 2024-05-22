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
        Schema::create('users_addressess', function (Blueprint $table) {
            $table->foreignId('id')->primary()->constrained('users_profile')->onUpdate('cascade');
            $table->string('region')->nullable()->comment('api_philippines_regions id');
            $table->string('province')->nullable()->comment('api_philippines_provinces id');
            $table->string('city')->nullable()->comment('api_philippines_cities id');
            $table->string('barangay')->nullable()->comment('api_philippines_barangays id');
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_addressess');
    }
};
