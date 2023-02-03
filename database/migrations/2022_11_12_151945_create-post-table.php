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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user-id')->unsigned();
            $table->text('title');
            $table->longtext('content');
            $table->longtext('slag');
            $table->longtext('photo');

            $table->timestamps();

            $table->foreign('user-id')->references('id')->on('users')
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
        Schema::dropIfExists('posts');
    }
};
