<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id'); // cột id primary key, auto increate, unsigned integer;
            $table->string("category_name", 500);
            $table->string("description", 1000)->nullable();
            $table->integer("parent_id")->unsigned()->nullable();
            $table->tinyInteger("is_active")->default(1);
            $table->foreign("parent_id")->references("id")->on("categories");
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
        Schema::dropIfExists('categories');
    }
}
