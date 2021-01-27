<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('maincategoryid');
            $table->integer('subcategoryid');
            $table->string('productname');
            $table->integer('yearofpurchase');
            $table->integer('expsellprice');
            $table->string('name');
            $table->string('mobile');
            $table->string('email');
            $table->string('state');
            $table->string('city');
            $table->text('photo');
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
        Schema::dropIfExists('advertisements');
    }
}
