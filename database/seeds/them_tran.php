<?php

use Illuminate\Database\Seeder;

class them_tran extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('matches')->insert([
             'start_time'=>date("2018-07-04 13:45:00"),
            'end_time'=>date("2018-07-04 15:12:00"),
            'time_close_bet'=>date("2018-07-04 13:45:00"),
            'is_public'=>false,
            'league'=>'C1 2018',
            'round'=>'Vòng 1/16',
          	'team_home_id'=>17, 
          	'team_away_id'=>12,
          	'odds_win'=>1.75,
          	'odds_draw'=>1.23,
          	'odds_lose'=>0.6
        ]);
        DB::table('matches')->insert([
            'start_time'=>date("2018-07-04 13:45:00"),
            'end_time'=>date("2018-07-04 15:12:00"),
            'time_close_bet'=>date("2018-07-04 13:45:00"),
            'is_public'=>true,
            'league'=>'Europa league',
            'round'=>'Vòng 1/16',
            'team_home_id'=>11, 
            'team_away_id'=>10,
            'odds_win'=>0.89,
            'odds_draw'=>1.23,
            'odds_lose'=>1.8
        ]);
        DB::table('matches')->insert([
           'start_time'=>date("2018-07-04 13:45:00"),
            'end_time'=>date("2018-07-04 15:12:00"),
            'time_close_bet'=>date("2018-07-04 13:45:00"),
            'is_public'=>true,
            'league'=>'World cup 2018',
            'round'=>'Vòng 1/16',
            'team_home_id'=>19, 
            'team_away_id'=>13,
            'odds_win'=>0.6,
            'odds_draw'=>1.2,
            'odds_lose'=>2.0
        ]);
        DB::table('matches')->insert([
            'start_time'=>date("2018-07-04 13:45:00"),
            'end_time'=>date("2018-07-04 15:12:00"),
            'time_close_bet'=>date("2018-07-04 13:45:00"),
            'is_public'=>true,
            'league'=>'Europa league',
            'round'=>'Vòng 1/16',
            'team_home_id'=>2, 
            'team_away_id'=>5,
            'odds_win'=>1.1,
            'odds_draw'=>1.0,
            'odds_lose'=>0.6
        ]);
        DB::table('matches')->insert([
           'start_time'=>date("2018-07-04 13:45:00"),
            'end_time'=>date("2018-07-04 15:12:00"),
            'time_close_bet'=>date("2018-07-04 13:45:00"),
            'is_public'=>true,
            'league'=>'World cup 2018',
            'round'=>'Vòng 1/16',
            'team_home_id'=>12, 
            'team_away_id'=>4,
            'odds_win'=>1.0,
            'odds_draw'=>0.9,
            'odds_lose'=>1.5
        ]);
        DB::table('matches')->insert([
             'start_time'=>date("2018-07-04 13:45:00"),
            'end_time'=>date("2018-07-04 15:12:00"),
            'time_close_bet'=>date("2018-07-04 13:45:00"),
            'is_public'=>true,
            'league'=>'C1 2018',
            'round'=>'Vòng bán kết',
            'team_home_id'=>18, 
            'team_away_id'=>3,
            'odds_win'=>0.9,
            'odds_draw'=>1.2,
            'odds_lose'=>0.8
        ]);
         DB::table('matches')->insert([
            'start_time'=>date("2018-07-04 13:45:00"),
            'end_time'=>date("2018-07-04 15:12:00"),
            'time_close_bet'=>date("2018-07-04 13:45:00"),
            'is_public'=>true,
            'league'=>'Europa league',
            'round'=>'Vòng bán kết',
            'team_home_id'=>12, 
            'team_away_id'=>5,
            'odds_win'=>0.9,
            'odds_draw'=>1.2,
            'odds_lose'=>0.8
        ]);
    }
}
