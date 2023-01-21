<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->string('image');

            $table->string('title_ru');
            $table->string('title_uz');
            $table->string('title_en');

            $table->string('slug_ru');
            $table->string('slug_uz');
            $table->string('slug_en');

            $table->text('content_ru');
            $table->text('content_uz');
            $table->text('content_en');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
