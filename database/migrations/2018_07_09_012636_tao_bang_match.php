<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaoBangMatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('start_time'); //dateTimeTz
            $table->dateTime('end_time');
            $table->dateTime('time_close_bet');
            $table->boolean('is_public')->default(false);
            $table->boolean('is_done')->default(false);
            $table->string('league');
            $table->string('round');
            $table->integer('team_home_id');
            $table->integer('team_away_id');
            $table->integer('home_score')->default(0);
            $table->integer('away_score')->default(0);
            $table->float('odds_win',8,2);
            $table->float('odds_draw',8,2);
            $table->float('odds_lose',8,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
