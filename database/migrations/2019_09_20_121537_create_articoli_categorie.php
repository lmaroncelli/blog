<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticoliCategorie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblArticoliCategorie', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('articolo_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->index('articolo_id');
            $table->index('categoria_id');
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
        Schema::dropIfExists('tblArticoliCategorie');
    }
}
