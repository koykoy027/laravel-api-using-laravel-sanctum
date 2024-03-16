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
        Schema::create('users_profile', function (Blueprint $table) {
            $table->foreignId('id')
                ->primary()
                ->constrained('users')
                ->onUpdate('cascade');
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->foreignId('gender')
                ->nullable()
                ->constrained('global_parameters');
            $table->foreignId('civil_status')
                ->nullable()
                ->constrained('global_parameters');
            $table->foreignId('religion')
                ->nullable()
                ->constrained('global_parameters');
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_profile');
    }
};
