@extends('index')
@section('title') Thông tin cá nhân 
@endsection
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5" >
				<h3 class="page-header">Thông tin cá nhân</h3>
				<div class="row" >
					<p class="col-lg-6" style="font-weight: bold;">ID của bạn:</p>
					<p class="col-lg-6">{{$user->id}}</p>
				</div>
				<div class="row" >
					<p class="col-lg-6" style="font-weight: bold;">Tên đăng nhập:</p>
					<p class="col-lg-6">{{$user->username}}</p>
				</div>
				<div class="row" >
					<p class="col-lg-6" style="font-weight: bold;">Họ tên:</p>
					<p class="col-lg-6">{{$user->name}}</p>
				</div>
				<div class="row" >
					<p class="col-lg-6" style="font-weight: bold;">Địa chỉ email:</p>
					<p class="col-lg-6">{{$user->email}}</p>
				</div>
				<div class="row" >
					<p class="col-lg-6" style="font-weight: bold;">Số điện thoại</p>
					<p class="col-lg-6">{{$user->phone_number}}</p>
				</div>
				<div class="row">
					<p class="col-lg-6" style="font-weight: bold;">Số tiền trong tài khoản</p>
					<p class="col-lg-6">{{$user->coin}}</p>
				</div>
				@php
				$all=0;
				foreach ($user->getBet as $key => $value) {
					$all+=$value->coin;
				}
				@endphp
				<div class="row">
					<p class="col-lg-6" style="font-weight: bold;">Tổng số tiền đã cược</p>
					<p class="col-lg-6">{{$all}}</p>
				</div>
				<div>
					<a href="{{url('')}}">
						<button class="btn btn-success">Trở về</button>
					</a>
					<a href="{{url('')}}/logout">
						<button class="btn btn-success">Đăng xuất</button>
					</a>					
				</div>
			</div>
			<div class="col-lg-7">
				<h3 class="page-header">Lịch sử đặt cược</h3>
				<table id="bets-user" class="table table-hover table-dark table-striped rounded">
					<thead >
						<tr align="center">
							<th class="double-row">ID vé cược</th>
							<th class="double-row">Trận</th>
							<th class="double-row">Bên đặt cược</th>
							<td class="double-row">Thời gian diễn ra</td>
							<th class="double-row">Số tiền cược</th>
							<th class="double-row">Số tiền thu về</th>
						</tr>
					</thead>
					<tbody>
						@foreach($user->getBet as $bet)
						@php
						$match=$bet->getMatch;
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
						if($match->is_done==true){
							if($match->home_score>$match->away_score  && $bet->outcome=='1')
								$money=$bet->coin*($odd+1);
							elseif ($match->home_score==$match->away_score && $bet->outcome=='x')
								$money=$bet->coin*($odd+1);
							elseif ($match->home_score<$match->away_score && $bet->outcome=='2')
								$money=$bet->coin*($odd+1);
							else $money='Không trúng';
						}else $money='Trận chưa có kết quả';
						@endphp
						<tr align="center">
							<td >{{$bet->id}}</td>
							<td>{{$teamhome->club_name}} - {{$teamaway->club_name}}</td>
							<td >{{$fc}} - {{$odd}}</td>
							<td>{{Carbon::parse($match->start_time)->format('H:i d-m-Y')}}</td>
							<td >{{$bet->coin}}</td>
							<td >{{$money}}</td> 
						</tr>	
						@endforeach					
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection