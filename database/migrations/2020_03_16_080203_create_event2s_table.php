<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvent2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('e_date');
            $table->string('e_name');
            $table->text('e_desc');
            $table->string('catagory_id')->nullable();
            $table->string('service_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event2s');
    }
}
