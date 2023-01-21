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
        Schema::create('expertpeoples', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('centerabout_id')->unsigned();

            $table->string('image');

            $table->string('title_ru');
            $table->string('title_uz');
            $table->string('title_en');

            $table->string('slug_ru');
            $table->string('slug_uz');
            $table->string('slug_en');

            $table->text('contact_ru');
            $table->text('contact_uz');
            $table->text('contact_en');

            $table->text('content_ru');
            $table->text('content_uz');
            $table->text('content_en');

            $table->text('biography_ru');
            $table->text('biography_uz');
            $table->text('biography_en');

            $table->text('publication_ru');
            $table->text('publication_uz');
            $table->text('publication_en');

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
        Schema::dropIfExists('expertpeoples');
    }
};
