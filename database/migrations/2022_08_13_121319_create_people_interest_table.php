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
        Schema::create('people_interest', function (Blueprint $table) {
            $table->id();
            $table->integer('people_id')->unsigned();
            $table->integer('interest_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('people_id')->references('id')->on('people')
                ->onDelete('cascade');
            $table->foreign('interest_id')->references('id')->on('interests')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_interest');
    }
};
