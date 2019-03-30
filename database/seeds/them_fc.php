<?php

use Illuminate\Database\Seeder;

class them_fc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('football_clubs')->insert([
            'club_sign'=>'ARG',
            'club_name'=>'Argentina'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'AUS',
            'club_name'=>'Úc'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'BEL',
            'club_name'=>'Bỉ'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'COL',
            'club_name'=>'Colombia'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'CRC',
            'club_name'=>'Costa rica'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'CRO',
            'club_name'=>'Croatia'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'DEN',
            'club_name'=>'Đan mạch'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'ENG',
            'club_name'=>'Anh'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'FRA',
            'club_name'=>'Pháp'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'GER',
            'club_name'=>'Đức'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'ISL',
            'club_name'=>'Iceland'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'MNC',
            'club_name'=>'AS Monaco'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'IOM',
            'club_name'=>'Olympique de Marseille'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'FCN',
            'club_name'=>'FC Nantes'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'PSG',
            'club_name'=>'Paris Saint-Germain'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'TFC',
            'club_name'=>'Toulouse FC'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'MAN',
            'club_name'=>'Manchester City F.C.'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'LIV',
            'club_name'=>'Liverpool F.C.'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'MU',
            'club_name'=>'Manchester United F.C.'
        ]);
        DB::table('football_clubs')->insert([
            'club_sign'=>'TOT',
            'club_name'=>'Tottenham Hotspur F.C.'
        ]);
    }
}
