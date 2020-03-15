<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecorationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decorations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('imagePath')->nullable();
            $table->string('d_title');
            $table->integer('service_id')->unsigned();
            $table->text('d_desc');
            $table->integer('qty')->default(1);
            $table->double('price',8,2);

            //foreign key
            //$table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decorations');
    }
}
