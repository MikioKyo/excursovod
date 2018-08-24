<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('pic');
            $table->float('lat',9,6);
            $table->float('lng',9,6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markers');
    }
}
