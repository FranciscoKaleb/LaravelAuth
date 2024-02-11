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
        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            // [1] personal info
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('middle_name')->default('');
            $table->string('extension')->default('');
            $table->string('citizenship')->default('');
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->default('');
            $table->enum('sex', ['male', 'female'])->nullable();
            $table->enum('civil_status',['single', 'married','widowed','separated'])->nullable();

            // [2] residential address
            $table->string('address')->default('');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info');
    }
};
