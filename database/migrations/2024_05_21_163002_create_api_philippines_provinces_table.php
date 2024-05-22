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
        Schema::create('api_philippines_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('psgc_code')->nullable();
            $table->string('province_name')->nullable();
            $table->string('region_code')->nullable();
            $table->string('province_code')->nullable();
            $table->integer('created_by')->nullable()->comment('users_profile id');
            $table->integer('updated_by')->nullable()->comment('users_profile id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_philippines_provinces');
    }
};
