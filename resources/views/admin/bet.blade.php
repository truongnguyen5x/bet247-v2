@extends('admin.header')
@section('title') Danh sách các khoản cược @endsection
@section('sub-content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Danh sách các phiếu cá cược</h2>
		</div>
	</div>
	<div class="row" style="margin-bottom: 30px">
		<div class="col-lg-12">
			<table id="bet-table" class="table table-striped table-bordered rounded">
				<thead>
					<tr align="center">
						<th >ID vé cược</th>
						<th >ID khách hàng</th>
						<th>Tên tài khoản</th>
						<th class="double-row">Trận</th>
						<th >Khách hàng đặt cược</th>
						<th >Số tiền cược</th>
						<th >Thời gian trận đấu</th>
						<th >Kết quả trận</th>
						<th>Số tiền khách thắng</th>
					</tr>
				</thead>
				<tbody>
					@foreach($list as $bet)
					<tr align="center">
						@php
						$match=$bet->getMatch;
						$teamhome=$match->getTeamHome;
						$teamaway=$match->getTeamAway;
						if(($bet->outcome)=='1'){
							$fc=$teamhome->club_name;
							$odd=$match->odds_win;
							$style="color:red";
						}
						elseif(($bet->outcome)=='x'){
							$fc='Hoà';
							$odd=$match->odds_draw;
							$style="color:blue";
						}else {
							$fc=$teamaway->club_name;
							$odd=$match->odds_lose;
							$style="";
						}
						@endphp
						<td>{{$bet->id}}</td>
						<td>{{$bet->user_id}}</td>
						<td>{{$bet->getUser->username}}</td>
						<td class="font-weight-bold">
							<p style="color: red">{{$teamhome->club_name}}</p>
							<p style="margin:0px;color: blue">{{$teamaway->club_name}}</p>
						</td>
						<td style="{{$style}}" >{{$fc}} - {{$odd}}</td>
						<td>{{$bet->coin}}</td>
						<td>{{Carbon::parse($match->start_time)->format('H:i d/m/Y')}}</td>
						<td >
							@if($match->is_done==false)
								Chưa có kết quả
							@else
								{{$match->home_score}} - {{$match->away_score}}
							@endif							
						</td>
						@php						
						if($match->is_done==true){
							if($match->home_score>$match->away_score  && $bet->outcome=='1')
								$money=$bet->coin*($odd+1);
							elseif ($match->home_score==$match->away_score && $bet->outcome=='x')
								$money=$bet->coin*($odd+1);
							elseif ($match->home_score<$match->away_score && $bet->outcome=='2')
								$money=$bet->coin*($odd+1);
							else $money='Không trúng';
						}else $money='Chưa có kết quả';
						@endphp
						<td>{{$money}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection