<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticoliTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblArticoliTags', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('articolo_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->index('articolo_id');
            $table->index('tag_id');
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
        Schema::dropIfExists('tblArticoliTags');
    }
}
