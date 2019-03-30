@extends('admin.header')
@section('title') Danh sách trận đấu @endsection
@section('sub-content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Danh sách các trận đấu</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			@if(session('notify'))
			<div class="alert alert-success">
				<strong>{{session('notify')}}</strong>
			</div>
			@endif
			<table id="match-table" class="table table-striped table-bordered rounded" >
				<thead>
					<tr align="center">
						<th rowspan="2" class="double-row">ID trận đấu</th>
						<th rowspan="2" class="double-row">Trận</th>
						<th rowspan="2" class="double-row">Thời gian bắt đầu</th>
						<th rowspan="2" class="double-row">Thời gian kết thúc</th>
						<th rowspan="2" class="double-row">Thời gian dừng nhận cược</th>
						<th rowspan="2" class="double-row">Giải đấu</th>
						<th rowspan="2" class="double-row">Kết quả</th>
						<th rowspan="2" class="double-row">Công khai/ẩn</th>
						<th colspan="3">Tỉ lệ cược</th>
						<th rowspan="2" class="double-row">Thao tác</th>
					</tr>
					<tr align="center">
						<th>Đội 1 thắng</th>
						<th>Hoà</th>
						<th>Đội 2 thắng</th>
					</tr>
				</thead>
				<tbody>
					@foreach($matches as $match)
					<tr align="center">
						<td>{{$match->id}}</td>
						<td class="font-weight-bold">
							<a href="{{url('')}}/admin/match/detail/{{$match->id}}" style="display: block;color: inherit;" title="Click để xem chi tiết">
								<p style="color: red">{{$match->getTeamHome->club_name}}</p>
								<p style="margin-bottom: 0px">{{$match->getTeamAway->club_name}}</p>
							</a>
						</td>
						<td>{{Carbon::parse($match->start_time)->format('H:i d/m/Y')}}</td>
						<td>{{Carbon::parse($match->end_time)->format('H:i d/m/Y')}}</td>
						<td>{{Carbon::parse($match->time_close_bet)->format('H:i d/m/Y')}}</td>
						<td>{{$match->round}}</td>
						@php
						if($match->is_done==false)
							$kq='Chưa có';
						else{
							$kq=$match->home_score.' - '.$match->away_score;
						}
						@endphp
						<td><h4><b>{{$kq}}</b> </h4></td>
						<td>{{$match->is_public==true ?'Công khai':'Ẩn' }}	</td>	
						<td><b style="color: red">{{$match->odds_win}}</b></td>
						<td><b style="color: blue">{{$match->odds_draw}}</b></td>
						<td><b>{{$match->odds_lose}}</b></td>
						<td style="min-width: 120px">
							<ul class="two-button-center">
								@if($match->is_public==false)
								<li>
									<i class="fas fa-edit"></i>
									<a href="{{url('')}}/admin/match/edit/{{$match->id}}">Sửa</a>
								</li>
								@endif
								@if(count($match->getBet)<=0)
								<li>
									<i class="fas fa-trash-alt"></i>
									<form action="admin/match/del/{{$match->id}}" method="POST"
										id="del-form{{$match->id}}" style="display: inline;"
										class='form-deleted'>
										@csrf
										<button type="submit" class="button-like-link" style="color: red">Xoá</button>
									</form>
								</li>
								@endif
								@if($match->is_done==false && $match->end_time<date('Y-m-d H:i:s'))
								<li>
									<i class="fas fa-sync"></i>
									<a href="{{url('')}}/admin/match/update/{{$match->id}}">Cập nhật KQ</a>
								</li>
								@endif
								<li>
									<i class="fas fa-info-circle"></i>
									<a href="{{url('')}}/admin/match/detail/{{$match->id}}" style="color: black">Chi tiết</a>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<a href="{{url('')}}/admin/match/add"><button class="btn btn-success" style="margin: 30px 0 30px">Thêm trận đấu</button></a>
	
</div>
@endsection