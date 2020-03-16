<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('imagePath')->nullable();
            $table->string('v_title');
            $table->integer('service_id')->unsigned();
            $table->text('v_location');
            $table->text('v_addr');
            $table->tinyInteger('v_status')->default(1);
            $table->integer('qty')->default(1);
            $table->double('price',8,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venues');
    }
}
