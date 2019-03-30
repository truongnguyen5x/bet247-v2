@extends('index')
@section('title') Chi tiết trận đấu @endsection
@section('content')
<nav class="background-gray navbar-50 navbar navbar-light ">
	<a class="navbar-brand" href="{{url('')}}">
		<img src="{{asset('image/icon.jfif')}}" class="rounded-circle"  height=30px width=30px >  bet247.com
		<small id="slogan">Cá cược bóng đá online tốt nhất</small>
	</a>
	<span class="navbar-text" >
		<span style="margin-right: 20px" id="datetime-label"></span>
	</span>
</nav>
<div id="page-wrapper-large">
	<div class="container">
		<div class="row">
			<div class="col-lg-12"><h2 class="page-header">Chi tiết thông tin trận đấu có ID {{$match->id}}</h2></div>
			<div class="col-lg-4">
				<img src="{{asset($match->getTeamHome->club_image)}}" alt="Ảnh lỗi" style="width: 250px;height: 250px;border-radius: 10%;object-fit: contain;display: block;margin: 0px auto;">
				<p align="center" style="font-size: 30px;font-weight: bold;">{{$match->getTeamHome->club_name}} </p>
			</div>
			<div class="col-lg-4">
				<p style="text-align:center;">{{$match->league}} - {{$match->round}}</p>
				@php
				if($match->is_done==false)
					$kq='Chưa có kết quả';	
					else $kq='';		
				@endphp
				<p style="text-align:center;margin: 10px; font-size: 40px"> VS</p>
				<p style="text-align:center;margin: 10px; font-size: 20px"> {{$kq}}</p>
				<p style="text-align:center; font-size: 50px"><b>{{$match->home_score}} - {{$match->away_score}}</b></p>
				<p style="text-align:center">Thời gian: {{Carbon::parse($match->start_time)->format('H:i d/m/Y')}}</p>
				<p style="text-align:center">đến {{Carbon::parse($match->end_time)->format('H:i d/m/Y')}}</p>
				<p style="text-align:center;margin-top: 30px">Thời gian dừng nhận cược: {{Carbon::parse($match->time_close_bet)->format('H:i d/m/Y')}}</p>
			</div> 
			<div class="col-lg-4">
				<img src="{{asset($match->getTeamAway->club_image)}}" alt="Ảnh lỗi" style="width: 250px;height: 250px;border-radius: 10%;object-fit: contain;display: block;margin: 0px auto;">  
				<p align="center" style="font-size: 30px;font-weight: bold;">{{$match->getTeamAway->club_name}}</p>
			</div>
		</div>
	</div>
	<div class="container">
		<table class="table  table-hover table-dark table-striped rounded">
			<thead>
				<tr align="center">
					<th>Thông tin</th>
					<th>{{$match->getTeamHome->club_name}}</th>
					<th>Hoà</th>
					<th>{{$match->getTeamAway->club_name}}</th>
				</tr>
			</thead>
			<tbody>
				<tr  align="center">
					<td>Tỉ lệ cược</td>
					<td>{{$match->odds_win}}</td>
					<td>{{$match->odds_draw}}</td>
					<td>{{$match->odds_lose}}</td>
				</tr>
				<tr  align="center">
					<td>Số người cược</td>
					<td>{{count($match->getBetHome)}}</td>
					<td>{{count($match->getBetDraw)}}</td>
					<td>{{count($match->getBetAway)}}</td>
				<tr>
			</tbody>
		</table>
		<a href="{{url('')}}">
			<button class="btn btn-success">Trở về</button>
		</a>		
	</div>
</div>
@endsection