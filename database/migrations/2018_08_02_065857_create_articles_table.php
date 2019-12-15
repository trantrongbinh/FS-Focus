<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('last_user_id')->unsigned();
            $table->integer('team_id')->unsigned()->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('page_image')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_original')->default(false);
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
