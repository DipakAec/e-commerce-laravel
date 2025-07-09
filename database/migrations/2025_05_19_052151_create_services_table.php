<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // for clean URLs
            $table->string('icon')->nullable(); // e.g. icon class or image path
            $table->string('banner')->nullable(); // path to banner image
            $table->text('description')->nullable(); // main service content

            $table->string('meta_title')->nullable(); // for SEO
            $table->string('meta_description')->nullable(); // for SEO

            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedInteger('position')->default(0); // for sorting

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
