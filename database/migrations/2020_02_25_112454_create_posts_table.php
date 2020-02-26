<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable;
            $table->integer('user_id')->nullable;
            $table->string('title');
            $table->longText('description');
            $table->text('image');
            $table->enum('is_featured',['Yes','No'])->default('No');
            $table->integer('total_hit')->nullable();
            $table->date('published_date');
            $table->enum('status',['Published','Unpublished']);
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
