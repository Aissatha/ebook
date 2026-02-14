<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author')->nullable();

            $table->text('description')->nullable();
            $table->string('language', 10)->default('fr'); // fr, en...

            $table->decimal('price', 10, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamp('published_at')->nullable();

            // Fichiers (privés)
            $table->string('cover_path')->nullable();   // image couverture
            $table->string('file_path');                // PDF (obligatoire)
            $table->string('preview_path')->nullable(); // extrait PDF optionnel

            $table->unsignedInteger('pages')->nullable();
            $table->string('isbn')->nullable();

            $table->timestamps();

            $table->index(['is_active', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ebooks');
    }
};
