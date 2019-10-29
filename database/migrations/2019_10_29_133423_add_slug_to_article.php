<?php

use App\Article;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblArticoli', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('titolo');
        });

        foreach (Article::all() as $article) 
          {
          $article->slug = str_slug($article->titolo);
          $article->save();
          }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblArticoli', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
