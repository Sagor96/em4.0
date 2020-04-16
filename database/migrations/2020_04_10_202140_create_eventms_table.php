<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('eventType')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
        DB::table('eventms')->insert(['eventType'=>'Party','status'=>1]);
        DB::table('eventms')->insert(['eventType'=>'Promotion','status'=>2]);
        DB::table('eventms')->insert(['eventType'=>'Educational','status'=>3]);
        DB::table('eventms')->insert(['eventType'=>'Conference','status'=>4]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventms');
    }
}
