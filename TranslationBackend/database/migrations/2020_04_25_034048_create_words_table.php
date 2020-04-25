<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('translation_id');
            $table->timestamps();
           
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('translation_id')->references('id')->on('translations')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:dropIfExists('words');
    }
}
