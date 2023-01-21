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
        Schema::create('projectnews', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('expertpeople_id')->unsigned();

            $table->string('image');

            $table->string('title_ru');
            $table->string('title_uz');
            $table->string('title_en');

            $table->string('slug_ru');
            $table->string('slug_uz');
            $table->string('slug_en');

            $table->string('ongoing_name_ru');
            $table->string('ongoing_name_uz');
            $table->string('ongoing_name_en');

            $table->text('description_ru');
            $table->text('description_uz');
            $table->text('description_en');

            $table->text('ongoing_content_ru');
            $table->text('ongoing_content_uz');
            $table->text('ongoing_content_en');

            $table->text('frame');

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
        Schema::dropIfExists('projectnews');
    }
};
