<?php
Route::get('register','LoginController@getRegister');					//view register
Route::post('register','LoginController@postRegister');					//view register
Route::get('login','LoginController@getLogin');							//view login
Route::post('login','LoginController@postLogin');						//view login
Route::middleware('userLogin')->group(function (){
	Route::get('bet/add/{id}/{a}','BetController@getAddBet');        	//view home
	Route::post('bet/add/{id}','BetController@postAddBet');				//view home
	Route::get('bet/del/{id}','BetController@getDelBet');				//view home
	Route::get('bet/dels','BetController@getDelAllBet');				//view home
	Route::get('logout','LoginController@getLogout');					//view profile admin.header
	Route::get('/','BetController@getMatch');							//view home
	Route::get('category/{a}/{b?}','BetController@getCategory');		//view home
	Route::get('user/profile/{id}','UserController@getProfile');		//view profile
	Route::get('match/detail/{id}','MatchController@getDetail');		//view match
});
Route::middleware('adminLogin')->group(function (){
	Route::view('header','admin.header'); 								//view header
	Route::prefix('admin')->group(function(){
		Route::prefix('club')->group(function(){
			Route::get('add','ClubController@getAdd');					//admin.club.add
			Route::post('add','ClubController@postAdd');				//admin.club.add
			Route::get('edit/{id}','ClubController@getEdit');			//admin.club.edit
			Route::post('edit/{id}','ClubController@postEdit');			//admin.club.edit
			Route::get('list','ClubController@getList');				//admin.club.list
			Route::post('del/{id}','ClubController@postDel');			//admin.club.list
		});
		Route::prefix('match')->group(function(){
			Route::get('add','MatchController@getAdd');					//admin.match.add
			Route::post('add','MatchController@postAdd');				//admin.match.add
			Route::get('edit/{id}','MatchController@getEdit');			//admin.match.edit
			Route::post('edit/{id}','MatchController@postEdit');		//admin.match.edit
			Route::get('list','MatchController@getList');				//admin.match.list
			Route::post('del/{id}','MatchController@postDel');			//admin.match.list
			Route::get('update/{id}','MatchController@getUpdate');		//admin.match.update
			Route::post('update/{id}','MatchController@postUpdate');	//admin.match.update
			Route::get('detail/{id}','MatchController@getDetailAdmin');	//admin.match.detail
		});
		Route::get('bet/list','BetController@getListAdmin');			//admin.bet
		Route::get('user/list','UserController@getListAdmin');			//admin.user
	});
});