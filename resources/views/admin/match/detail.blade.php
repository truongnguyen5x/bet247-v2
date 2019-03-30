@extends('admin.header')
@section('title') Chi tiết trận đấu @endsection
@section('sub-content')
<div class="container-fluid">
	<div class="row" style="margin-bottom: 20px">
		<div class="col-lg-12"> <h2 class="page-header">Chi tiết thông tin trận đấu có ID {{$match->id}}</h2></div>
		<div class="col-lg-4">
			<img src="{{asset($match->getTeamHome->club_image)}}" alt="Ảnh lỗi" style="width: 250px;height: 250px;border-radius: 10%;object-fit: contain;display: block;margin: 0px auto;">
			<p align="center" style="font-size: 30px;font-weight: bold;">{{$match->getTeamHome->club_name}} </p>
		</div>
		<div class="col-lg-4">
			<p style="text-align:center;">{{$match->league}} - {{$match->round}}</p>
			<p style="text-align:center;margin: 10px; font-size: 40px"> VS</p>
			@if($match->is_done==false)
					<p style="text-align:center;margin: 20px;">Chưa có kết quả</p>	
			@endif
			<p style="text-align:center; font-size: 50px"><b>{{$match->home_score}} - {{$match->away_score}}</b></p>
			<p style="text-align:center">Thời gian: {{Carbon::parse($match->start_time)->format('H:i d/m/Y')}}</p>
			<p style="text-align:center">đến {{Carbon::parse($match->end_time)->format('H:i d/m/Y')}}</p>
			<p style="text-align:center;margin-top: 30px">Thời gian dừng nhận cược: {{Carbon::parse($match->time_close_bet)->format('H:i d/m/Y')}}</p>
			<p style="text-align: center;">Trạng thái công khai:
				@if($match->is_public==true)
				Công khai
				@else
				Ẩn
				@endif
			</p>
		</div>
		<div class="col-lg-4">
			<img src="{{asset($match->getTeamAway->club_image)}}" alt="Ảnh lỗi" style="width: 250px;height: 250px;border-radius: 10%;object-fit: contain;display: block;margin: 0px auto;">
			<p align="center" style="font-size: 30px;font-weight: bold;">{{$match->getTeamAway->club_name}}</p>
		</div>
	</div>
	<div style="margin-bottom: 20px">
		<ul class="two-button-center" >
			@if($match->is_public==false)
			<li style="display: inline;">
				<a href="{{url('')}}/admin/match/edit/{{$match->id}}">
					<button class="btn btn-success" type="button">Sửa trận đấu</button>
				</a>
			</li>
			@endif
			@if(count($match->getBet)<=0)
			<li style="display: inline;">
				<form action="admin/match/del/{{$match->id}}" method="POST"
					id="del-form{{$match->id}}" style="display: inline;"
					class='form-deleted'>
					@csrf
					<button type="submit" class="btn btn-success">Xoá trận</button>
				</form>
			</li>
			@endif
			@if($match->is_done==false && $match->end_time<date('Y-m-d H:i:s'))
				<li style="display:inline">
					<a href="{{url('')}}/admin/match/update/{{$match->id}}">
						<button class="btn btn-success">Cập nhật kết quả</button>
					</a>					
				</li>
			@endif
			<li style="display: inline;">
				<a href="{{url('')}}/admin/match/list">
					<button class="btn btn-success" type="button">Trở về</button>
				</a>
			</li>
		</ul>
	</div>
	
</div>
<div class="container">
	
	<table class="table table-bordered table-hover table-dark table-striped rounded" style="margin-bottom: 20px">
		<thead>
			<tr align="center">
				<th>Thông tin</th>
				<th>{{$match->getTeamHome->club_name}}</th>
				<th>Hoà</th>
				<th>{{$match->getTeamAway->club_name}}</th>
			</tr>
		</thead>
		<tbody>
			<tr align="center">
				<td>Tỉ lệ cược</td>
				<td>{{$match->odds_win}}</td>
				<td>{{$match->odds_draw}}</td>
				<td>{{$match->odds_lose}}</td>
			</tr>
			<tr align="center">
				<td>Số người cược</td>
				<td>{{count($match->getBetHome)}}</td>
				<td>{{count($match->getBetDraw)}}</td>
				<td>{{count($match->getBetAway)}}</td>
			</tr>
			<tr align="center">
				<td>Tổng số tiền cược</td>
				<td>{{$coin1}}</td>
				<td>{{$coin2}}</td>
				<td>{{$coin3}}</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="container" style="padding-bottom: 40px">
	<p>Các vé cược của trận đấu</p>
	<table id="bets-in-one-match-table" class="table table-bordered table-hover table-striped table-dark rounded" style="margin-bottom: 20px">
		<thead >
			<tr align="center">
				<th>ID vé cược</th>
				<th>ID khách hàng</th>
				<th>Khách hàng đặt cược</th>
				<th>Số tiền cược</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($match->getBet as $bet)
			<tr align="center">
				<td>{{$bet->id}}</td>
				<td>{{$bet->user_id}}</td>
				@php
				$teamhome=$match->getTeamHome;
				$teamaway=$match->getTeamAway;
				if(($bet->outcome)=='1'){
					$fc=$teamhome->club_name;
					$odd=$match->odds_win;
				}
				elseif(($bet->outcome)=='x'){
					$fc='Hoà';
					$odd=$match->odds_draw;
				}else {
					$fc=$teamaway->club_name;
					$odd=$match->odds_lose;
				}
				@endphp
				<td>{{$fc}} - {{$odd}}</td>
				<td>{{$bet->coin}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection