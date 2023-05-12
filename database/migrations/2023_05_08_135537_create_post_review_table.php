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
        Schema::create('post_review', function (Blueprint $table) {
                $table->unsignedBigInteger('review_id');
                $table->unsignedBigInteger('post_id');
                $table->timestamps();
                // внешний ключ, ссылается на поле id таблицы users
                $table->foreign('post_id')
                    ->references('id')
                    ->on('posts')
                    ->onDelete('cascade');
                // внешний ключ, ссылается на поле id таблицы permissions
                $table->foreign('review_id')
                    ->references('id')
                    ->on('reviews')
                    ->onDelete('cascade');
                // составной первичный ключ
                $table->primary(['post_id', 'review_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_review');
    }
};
