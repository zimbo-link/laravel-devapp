<?php

use App\Enums\SALanguage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", 255);
            $table->string("surnname", 255);
            $table->string("national_id", 13);
            $table->string("mobile_number", 255);
            $table->string("email", 255);
            $table->date("birth_date");
            $table->tinyInteger('language')->unsigned()->default(SALanguage::English);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
};
