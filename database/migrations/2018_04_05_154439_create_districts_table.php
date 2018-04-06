<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id')->unsigned();
            $table->string('name');
            $table->string('bn_name');
            $table->double('lat');
            $table->double('lon');
            $table->string('website');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
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
        Schema::table('districts',function (Blueprint $table){
            $table->dropForeign(['division_id']);
        });
        Schema::dropIfExists('districts');
    }
}
