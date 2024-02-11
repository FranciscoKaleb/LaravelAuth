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
        Schema::create('user_temp', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->string('confirmation_code')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_user_log_in');
    }
};
