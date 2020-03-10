<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropColumn('role');
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->text('role')->nullable();
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
            $table->text('role')->nullable();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}
