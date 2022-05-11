<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->string('image');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->tinyInteger('navbar_status')->default(0);
            $table->tinyInteger('status')->default(0); // showing|hiding the categories from the frontend
            $table->integer('created_by');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
