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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_name')->nullable();
            $table->string('country_code', 5)->unique()->nullable();
            $table->string('currency_name')->nullable();
            $table->string('currency_code', 5)->nullable();
            $table->decimal('rate_to_inr', 15, 8)->nullable();
            $table->string('currency_dial_code', 10)->nullable();
            $table->tinyInteger('currency_dial_code_length')->nullable();
            $table->text('timezones')->nullable();
            $table->text('iso')->nullable();
            $table->string('flag')->nullable();
            $table->string('emoji')->nullable();
            $table->bigInteger('population')->nullable();
            $table->string('capital')->nullable();
            $table->string('continent_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
