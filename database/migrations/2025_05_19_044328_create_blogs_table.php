<?php

// database/migrations/xxxx_xx_xx_create_blogs_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique(); // for SEO
            $table->string('thumbnail')->nullable(); // path to blog image
            $table->text('excerpt')->nullable(); // short description
            $table->longText('content'); // full blog content
            $table->string('meta_title')->nullable(); // for SEO
            $table->string('meta_description')->nullable(); // for SEO
            $table->enum('status', ['draft', 'published', 'deactivated'])->default('draft');
            $table->foreignId('admin_id')->nullable()->constrained('admins')->onDelete('set null'); // blog author
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
