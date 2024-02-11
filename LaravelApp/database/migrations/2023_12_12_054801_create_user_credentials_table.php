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
        Schema::create('user_credentials', function (Blueprint $table) {
            $table->id('credentials_id');
            $table->foreignId('user_id')->nullable()->constrained('user_info');
            $table->string('email')->nullable()->unique();
            $table->string('user_name')->nullable()->unique();
            $table->string('password')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_credentials');
    }
};
