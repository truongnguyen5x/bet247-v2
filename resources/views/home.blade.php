@extends('index')
@section('title') Bet247.com
@endsection
@section('content')
<div id="wrapper">
	<nav class="background-gray navbar-50 navbar navbar-light navbar-expand-lg">
		<a class="navbar-brand" href="{{url('')}}" title="Trang chủ bet247.com">
			<img src="{{asset('image/icon.jfif')}}" class="rounded-circle" height=30px width=30px> bet247.com
			<small id="slogan">Web cá cược bóng đá online hàng đầu</small>
		</a>
		<div class="ml-auto">
			<span style="margin-right: 20px" id="datetime-label"></span>
			@php
			$a=Auth::user();
			$chua_cuoc=$a->getAllBet->where('state',0);
			$chua_thanh_toan=array();
			$da_cuoc=$a->getAllBet->where('state',1);
			foreach ($da_cuoc as $key => $value) {
				if($value->getMatch->is_done==0)
					array_push($chua_thanh_toan,$value);
			}
			@endphp
			<span style="margin-right: 20px">Ví {{$a->coin}} $APC</span>
			<span style="margin-right: 20px">
				<a href="{{url('')}}/user/profile/{{$a->id}}"> Thông tin cá nhân</a>
			</span>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-content">
		<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
	<div class="left-sidebar">
		<ul id="menu-content" class="menu-content collapse hide">
			@if($a->username=='admin')
			<p style="margin: 0px;line-height: 40px"> <b id="label-admin-page">
				<a href="{{url('')}}/header">Tới trang Admin</a>
				</b>
			</p>
			@endif
			<li>
				<a href="{{url('')}}">
				<i class="fas fa-futbol"></i> Tất cả trận đấu</a>
			</li>
			<li>
				<a href="{{url('')}}/category/live">
				<i class="fas fa-broadcast-tower"></i> Các trận trực tiếp</a>
			</li>
			<li>
				<a href="{{url('')}}/category/today">
				<i class="fas fa-user"></i> Các trận hôm nay</a>
			</li>
			<li data-toggle="collapse" data-target="#products" class="collapsed">
				<a>
					<i class="fas fa-chess-knight"></i> Các trận sắp tới
					<i class="fas fa-angle-down arrow-down"></i>
				</a>
			</li>
			<ul class="sub-menu collapse" id="products">
				@foreach($dates as $date_label)
				<li>
					<a href="{{url('')}}/category/comingup/{{$date_label}}" style="margin-left: 40px">Ngày {{date('d-m-Y',strtotime($date_label))}}
					</a>
				</li>
				@endforeach
			</ul>
			<li data-toggle="collapse" data-target="#products2" class="collapsed">
				<a>
					<i class="fas fa-list-ul"></i> Danh sách giải đấu
					<i class="fas fa-angle-down arrow-down"></i>
				</a>
			</li>
			<ul class="sub-menu collapse" id="products2">
				@foreach($leagues as $league)
				<li>
					<a href="{{url('')}}/category/league/{{$league}}" style="margin-left: 40px">Giải {{$league}}
					</a>
				</li>
				@endforeach
			</ul>
		</ul>
	</div>
	<div id="page-wrapper-small">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="page-header">{{$tieude}}</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12" style="margin-bottom:30px ">
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button> Hãy click vào bên bạn muốn đặt cược
					</div>
					@if(session('notify'))
					<div class="alert alert-danger">
						<strong>{{session('notify')}}</strong>
					</div>
					@endif
					<table id="home-table" class="table table-striped table-bordered">
						<thead>
							<tr align="center">
								<th rowspan="2" class="double-row">Trận đấu</th>
								<th rowspan="2" class="double-row">Thời gian bắt đầu</th>
								<th rowspan="2" class="double-row">Thời gian kết thúc</th>
								<th rowspan="2" class="double-row">Dừng nhận cá cược</th>
								<th rowspan="2" class="double-row">Giải đấu</th>
								<th rowspan="2" class="double-row">Kết quả</th>
								<th colspan="3">Chọn bên đặt cược</th>
							</tr>
							<tr align="center">
								<th>Đội 1 thắng</th>
								<th>Hoà</th>
								<th>Đội 2 thắng</th>
							</tr>
						</thead>
						<tbody>
							@foreach($matches as $match)
							@php
							$team_home=$match->getTeamHome;
							$team_away=$match->getTeamAway;
							@endphp
							<tr align="center">
								<td style="font-weight: bold;" title="Click để xem chi tiết trận">
									<a href="{{url('')}}/match/detail/{{$match->id}}">
										<p style="color: red">
											<b>{{$team_home->club_name}}</b>
										</p>
										<p style="margin-bottom: 0">
											<b>{{$team_away->club_name}}</b>
										</p>
									</a>
								</td>
								<td>{{Carbon::parse($match->start_time)->format('H:i d/m/Y')}}</td>
								<td>{{Carbon::parse($match->end_time)->format('H:i d/m/Y')}}</td>
								<td>{{Carbon::parse($match->time_close_bet)->format('H:i d/m/Y')}}</td>
								<td>{{$match->league}} - {{$match->round}}</td>
								@php
								if($match->is_done==false) $kq='Chưa có';
								else{
								$kq=$match->home_score.' - '.$match->away_score;
								}
								@endphp
								<td>{{$kq}}</td>
								<td align="center" style="color: red;background-color: white" title="Đặt cược {{$team_home->club_name}} thắng">
									<a href="{{url('')}}/bet/add/{{$match->id}}/1" style="color: inherit;">
										<p>{{$team_home->club_name}}</p>
										<p style="color: black">
											<b>{{$match->odds_win}}</b>
										</p>
									</a>
								</td>
								<td align="center" title="Đặt cược 2 đội hoà nhau">
									<a href="{{url('')}}/bet/add/{{$match->id}}/x" style="color: inherit;">
										<p>Hoà</p>
										<p style="color: black">
											<b>{{$match->odds_draw}}</b>
										</p>
									</a>
								</td>
								<td align="center" style="color: blue;background-color: white" title="Đặt cược {{$team_away->club_name}} thắng">
									<a href="{{url('')}}/bet/add/{{$match->id}}/2" style="color: inherit;">
										<p>{{$team_away->club_name}}</p>
										<p style="color: black">
											<b>{{$match->odds_lose}}</b>
										</p>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="right-sidebar">
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#bet1">Vé chưa cược</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#bet2" style="padding: 8px">Vé đang cược</a>
			</li>
		</ul>
		<div class="tab-content">
			<div id="bet1" class="container tab-pane active" style="padding: 0">
				@foreach($chua_cuoc as $bet)
				@php $match=$bet->getMatch;
				$teamhome=$match->getTeamHome;
				$teamaway=$match->getTeamAway;
				if(($bet->outcome)=='1'){
					$fc=$teamhome->club_name;
					$odd=$match->odds_win;
				} elseif(($bet->outcome)=='x'){
					$fc='Hoà';
					$odd=$match->odds_draw;
				}else{
					$fc=$teamaway->club_name;
					$odd=$match->odds_lose;
				}
				@endphp
				<div class="bet-card-1">
					<form method="POST" action="bet/add/{{$bet->id}}">
						@csrf
						<a href="{{url('')}}/bet/del/{{$bet->id}}" title="Xoá vé này">
							<i class="fas fa-times-circle" style="color:white;float: right;margin: 2px"></i>
						</a>
						<p style="font-weight: bold;font-size: 18px;text-align:center;">{{$fc}} - {{$odd}}</p>
						<p style="margin-left: 10px">{{$teamhome->club_name}} vs {{$teamaway->club_name}} - {{$match->league}}</p>
						<p style="margin-left: 10px;text-align:center;">{{Carbon::parse($match->start_time)->format('H:i d-m-Y')}}</p>
						<p style="margin-left: 10px;text-align: center;">Tiền đặt cược(Alt+ coin):</p>
						<p align="center">
							<input type="number" name="coin" style="width: 100px;margin: 0px;display: inline-block;text-align: center;" class="form-control"
							title="Hãy nhập số tiền cược">
						</p>
						<div style="text-align: center;" title="Đặt cược vé này">
							<button class="btn btn-success btn-sm" type="submit" style="margin: 10px">Đặt cược</button>
						</div>
					</form>
				</div>
				@endforeach
				<div style="text-align: center;">
					<a href="{{url('')}}/bet/dels">
						<button class="btn btn-danger btn-sm" type="button" title="Xoá tất cả vé chưa cược">Xoá tất cả</button>
					</a>
				</div>
			</div>
			<div id="bet2" class="container tab-pane fade" style="padding: 0">
				@foreach($chua_thanh_toan as $bet)
				@php
				$match=$bet->getMatch;
				$teamhome=$match->getTeamHome;
				$teamaway=$match->getTeamAway;
				if(($bet->outcome)=='1'){
					$fc=$teamhome->club_name;
					$odd=$match->odds_win;
				} elseif(($bet->outcome)=='x'){
					$fc='Hoà';
					$odd=$match->odds_draw;
				}else {
					$fc=$teamaway->club_name; $odd=$match->odds_lose;
				}
				@endphp
				<div class="bet-card-2">
					<p style="font-weight: bold;font-size: 18px;text-align:center;">{{$fc}}-{{$odd}}</p>
					<p style="margin-left: 10px">{{$teamhome->club_name}} vs {{$teamaway->club_name}}-{{$match->league}}</p>
					<p style="margin-left: 10px;text-align:center;">Từ {{Carbon::parse($match->start_time)->format('H:i d-m-Y')}}</p>
					<p style="margin-left: 10px;text-align:center;">đến {{Carbon::parse($match->end_time)->format('H:i d-m-Y')}}</p>
					<p style="margin-left: 10px;margin-top:20px ">Tiền cược {{$bet->coin}} $AltPlus coin</p>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection