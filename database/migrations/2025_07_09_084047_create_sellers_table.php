<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('sellers', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->string('username')->unique();
        $table->string('email')->unique();
        $table->string('mobile')->unique();

        $table->foreignId('country')->constrained('countries')->onDelete('cascade');
        $table->foreignId('state')->constrained('states')->onDelete('cascade');
        $table->foreignId('city')->constrained('cities')->onDelete('cascade');
        $table->string('pin');

        $table->string('product_type');
        $table->string('gstin')->unique();

        $table->string('password');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
