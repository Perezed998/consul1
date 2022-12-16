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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('sanidad')->nullable();
            $table->integer('numcolegio')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->boolean('genero')->nullable();
            $table->boolean('estatus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('votes');
            $table->dropColumn('sanidad');
            $table->dropColumn('numcolegio');
            $table->dropColumnte('fecha_nacimiento');
            $table->dropColumn('genero');
            $table->dropColumn('estatus');
            
        });
    }
};
