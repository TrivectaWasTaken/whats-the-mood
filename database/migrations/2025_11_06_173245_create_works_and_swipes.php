<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['book','movie','game']);
            $table->string('title');
            $table->unsignedSmallInteger('year')->nullable();
            $table->string('cover_url')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->index(['type', 'year']);
        });

        Schema::create('swipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('work_id')->constrained('works')->cascadeOnDelete();
            $table->enum('direction', ['like','dislike']);
            $table->timestamps();

            $table->unique(['user_id','work_id']);
            $table->index(['user_id','direction']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('swipes');
        Schema::dropIfExists('works');
    }
};

