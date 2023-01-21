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
        Schema::create('ourcontacts', function (Blueprint $table) {
            $table->id();

            $table->string('phone_number');

            $table->string('fax');

            $table->string('email');

            $table->string('adsress_ru');
            $table->string('adsress_uz');
            $table->string('adsress_en');

            $table->string('landmarks_ru');
            $table->string('landmarks_uz');
            $table->string('landmarks_en');
            
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
        Schema::dropIfExists('ourcontacts');
    }
};
