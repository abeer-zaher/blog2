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
        Schema::create('post-tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag-id')->unsigned();
            $table->integer('post-id')->unsigned();
            $table->timestamps();

            
            $table->foreign('tag-id')->references('id')->on('tags')
            ->onDelete('cascade');
            
            $table->foreign('post-id')->references('id')->on('posts')
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
        Schema::dropIfExists('post-tags');
    }
};
