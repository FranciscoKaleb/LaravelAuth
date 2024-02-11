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
        Schema::create('user_sessions', function (Blueprint $table) {
            $table->id('session_id');
            $table->foreignId('user_id')->nullable()->constrained('user_info');
            $table->string('token')->nullable();
            $table->datetime('expiration_timestamp')->nullable();
            $table->string('status_', 45)->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
