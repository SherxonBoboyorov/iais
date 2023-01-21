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
        Schema::create('directors', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('centerabout_id')->unsigned();

            $table->string('image');

            $table->string('director_name_ru');
            $table->string('director_name_uz');
            $table->string('director_name_en');

            $table->string('job_title_ru');
            $table->string('job_title_uz');
            $table->string('job_title_en');

            $table->string('phone_number');

            $table->string('reception_days_ru');
            $table->string('reception_days_uz');
            $table->string('reception_days_en');

            $table->string('email');

            $table->text('center_for_sustianable_ru');
            $table->text('center_for_sustianable_uz');
            $table->text('center_for_sustianable_en');

            $table->text('development_ru');
            $table->text('development_uz');
            $table->text('development_en');

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
        Schema::dropIfExists('directors');
    }
};
