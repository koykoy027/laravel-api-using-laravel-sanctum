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
        Schema::create('global_parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type')->nullable()->constrained('global_parameters_type');
            $table->integer('code')->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('global_parameters');
    }
};
