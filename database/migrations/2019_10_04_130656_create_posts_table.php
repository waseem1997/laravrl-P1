<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->string('post_title');
            $table->string('post_content');
            $table->bigInteger('post_user')->unsigned(); // i want this as a foreign key 
            $table->bigInteger('post_cat')->unsigned(); // foreign key 
            $table->foreign('post_user')->references('id')->on('users')->onDelete('cascade'); // create the foreign key 
            $table->foreign('post_cat')->references('cat_id')->on('categories')->onDelete('cascade'); 
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
        Schema::dropIfExists('posts');
    }
}
