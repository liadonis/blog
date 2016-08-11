<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_article', function (Blueprint $table) {
            $table->increments('art_id');
            $table->string('art_title',100);
            $table->string('art_tag',100);
            $table->string('art_description',255);
            $table->string('art_thumb',255);
            $table->text('art_content');
            $table->integer('art_time');
            $table->string('art_editor',50);
            $table->integer('art_view');
            $table->integer('cate_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog_article');
    }
}
