<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();           // optional title
            $table->string('subtitle')->nullable();        // optional subtitle
            $table->text('text')->nullable();              // additional descriptive text on banner
            $table->string('image');                       // banner image path
            $table->string('button_text')->nullable();     // optional button text
            $table->string('button_link')->nullable();     // optional button URL
            $table->enum('status', ['active', 'inactive'])->default('active'); // show/hide slider
            $table->unsignedInteger('position')->default(0); // slider ordering
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_sliders');
    }
};

