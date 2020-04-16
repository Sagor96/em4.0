<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishtypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dishtypes')->nullable();
            $table->timestamps();
        });
        DB::table('dishtypes')->insert(['dishtypes'=>'Deluxe']);
        DB::table('dishtypes')->insert(['dishtypes'=>'Regular']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishtypes');
    }
}
