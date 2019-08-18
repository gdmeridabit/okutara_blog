<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostCategorize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categorize', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id',false,true);
            $table->foreign('post_id')->references('id')->on('posts');
            $table->bigInteger('category_id',false,true);
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::drop('post_categorize');
    }
}
