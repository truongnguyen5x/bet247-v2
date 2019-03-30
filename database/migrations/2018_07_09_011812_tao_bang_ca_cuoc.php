<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaoBangCaCuoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id');
            $table->integer('user_id');
            $table->integer('coin')->default(0);
            $table->enum('outcome',['1','x','2']);
            $table->boolean('state')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_bets');
    }
}
