<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAnimalTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('pets', 'animals');

        Schema::table('animals', function (Blueprint $table) {
            $table->renameColumn('date', 'birthDate');
            $table->dropColumn('name');
            $table->integer('certificate');
            $table->integer('order');
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
            $table->text('name');
            $table->renameColumn('birthDate', 'date');
            $table->dropColumn('certificate');
            $table->dropColumn('order');
        });

        Schema::rename('animals', 'pets');
    }
}

?>