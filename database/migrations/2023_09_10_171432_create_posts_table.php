<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title",255)->nullable();
            $table->string("slug",255)->nullable();
            $table->text('description')->nullable();
            $table->text("content")->nullable();
            $table->string("image")->nullable();
            $table->enum("posted",['yes', 'not'])->default('not');
            $table->unsignedBigInteger('category_id')->default(8);
            $table->timestamps();

            $table->foreignId('category_id')->constrained()
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
