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
        Schema::create('marketers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('contact')->unique();
            $table->string('serial_number')->unique();
            $table->string('address');
            $table->decimal('amount_paid');
            $table->decimal('unpaid_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketers');
    }
};
