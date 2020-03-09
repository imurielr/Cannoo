<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLikesField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->integer('likes')->default(0);
        });
        Schema::table('products', function (Blueprint $table) {
            $table->integer('likes')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropcolumn('likes');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropcolumn('likes');
        });
    }
}
