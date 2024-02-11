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
        Schema::create('user_logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->foreignId('user_id')->nullable()->constrained('user_info');
            $table->foreignId('session_id')->nullable()->constrained('user_sessions', 'session_id');
            $table->string('ip_address', 20)->nullable();
            $table->string('event_', 45)->nullable();
            $table->datetime('time_stamp')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_logs');
    }
};
