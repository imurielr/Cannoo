<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterItemAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('items', function (Blueprint $table) {
            $table->integer('order')->unsigned()->nullable()->change();
            //$table->renameColumn('order', 'order_id');
            $table->integer('order_id');
        });
        Schema::table('animals', function (Blueprint $table) {
            $table->integer('order')->unsigned()->change();
            //$table->renameColumn('order', 'order_id');
            $table->integer('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('items', function (Blueprint $table) {
            $table->integer('order')->change();
            $table->dropColumn('order_id');
            //$table->renameColumn('order_id', 'order');
        });
        Schema::table('animals', function (Blueprint $table) {
            //$table->dropColumn('order');
            $table->integer('order')->change();
            $table->dropColumn('order_id');
            //$table->renameColumn('order_id', 'order');
        });
    }
}
