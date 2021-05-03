<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBook2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("book2", function (Blueprint $table){
            $table->id();
            $table->string("name", 500);
            $table->string("title", 500);
            $table->string("author", 100)->nullable();
            $table->double("price");
            $table->dateTime("publish")->nullable();
            $table->tinyInteger("is_active")->default(1);
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
        Schema::dropIfExists("book2");
    }
}
