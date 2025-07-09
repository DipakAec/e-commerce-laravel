<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position')->nullable();        // e.g. CEO, Developer
            $table->string('photo')->nullable();           // team member photo
            $table->text('bio')->nullable();               // short description or bio
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('email')->nullable();           // optional contact
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedInteger('order')->default(0);  // ordering on frontend
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
