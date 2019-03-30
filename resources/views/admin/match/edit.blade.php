@extends('admin.header')
@section('title') Sửa thông tin trận đấu @endsection
@section('sub-content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12"> <h2 class="page-header">Sửa trận đấu có ID {{$match->id}}</h2></div>
		<div class="col-lg-8">
			<form action="admin/match/edit/{{$match->id}}" method="POST">
				@csrf
				@if(session('notify'))
				<div class="alert alert-success">
					<strong>{{session('notify')}}</strong>
				</div>
				@endif
				<div class="form-row" style="margin-bottom: 20px">
					<div class="form-group col-lg-6">
						<label>Trạng thái công khai/ẩn</label>
						<select class="form-control" name="is_public">
							<option value="public" {{$match->is_public=='public'?' selected ': ''}}>Công khai</option>
							<option value="hidden" {{$match->is_public=='hidden'?' selected ': ''}}>Ẩn</option>
						</select>
					</div>
				</div>
				<div class="form-row" style="margin-bottom: 20px">
					<div class="form-group col-lg-6" >
						<label>Vòng đấu</label>
						<input class="form-control{{ $errors->has('round') ? ' is-invalid' : '' }}" type="text" name="round" value="{{$match->round}}">
						@if ($errors->has('round'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('round') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<input type="datetime-local" name="start_time" style="display:none;" value="{{$match->start_time}}">
				<div class="form-row" style="margin-bottom: 20px">
					<div class="form-group col-lg-6">
						<label>Đội chủ nhà</label>
						<select class="form-control{{ $errors->has('team_away') ? ' is-invalid' : '' }}" name="team_home" value="{{$match->team_home_id}}">
							@foreach($clubs as $club)
							<option value="{{$club->id}}" {{$club->id==$match->team_home_id ?' selected ':''}}>
								ID:{{$club->id.' '}}
								{{$club->club_name}}
							</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-lg-6">
						<label >Đội khách</label>
						<select class="form-control{{ $errors->has('team_away') ? ' is-invalid' : '' }}" name="team_away" value="{{$match->team_away_id}}">
							@foreach($clubs as $club)
							<option value="{{$club->id}}" {{$club->id==$match->team_away_id ?' selected ':''}}>
								ID:{{$club->id.' '}}
								{{$club->club_name}}
							</option>
							@endforeach
						</select>
						@if ($errors->has('team_away'))
						<span class="invalid-feedback" role="alert" style="display: block;">
							<strong>{{ $errors->first('team_away') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-row" style="margin-bottom: 20px">
					@php
					$end = new Carbon($match->end_time);
					$close= new Carbon($match->time_close_bet);
					$start=new Carbon($match->start_time);
					$a= Carbon::parse($end)->format("Y-m-d").'T'.Carbon::parse($end)->format("H:i:s");
					$b=Carbon::parse($close)->format("Y-m-d").'T'.Carbon::parse($close)->format("H:i:s");
					$c=Carbon::parse($start)->format("Y-m-d").'T'.Carbon::parse($start)->format("H:i:s");
					@endphp
					<div class="form-group col-lg-4" >
						<label >Thời gian bắt đầu</label>
						<input class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" type="datetime-local" name="start_time" style="margin-right: 40px" value="{{$c}}" readonly>
					</div>
					<div class="form-group col-lg-4" >
						<label >Thời gian kết thúc</label>
						<input class="form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }}" type="datetime-local" name="end_time" style="margin-right: 40px" value="{{$a}}">
						@if ($errors->has('end_time'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('end_time') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group col-lg-4" >
						<label >Thời gian dừng nhận cá cược</label>
						<input class="form-control{{ $errors->has('time_close_bet') ? ' is-invalid' : '' }}" type="datetime-local" name="time_close_bet" style="margin-right: 40px" value="{{$b}}">
						@if ($errors->has('time_close_bet'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('time_close_bet') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<label>Tỉ lệ cược </label>
				<div class="form-row" style="margin-bottom: 20px">
					<div class="form-group col-lg-4">
						<label >Đội chủ nhà thắng</label>
						<input type="text" class="form-control{{ $errors->has('odds_win') ? ' is-invalid' : '' }}" name="odds_win" value="{{$match->odds_win}}">
						@if ($errors->has('odds_win'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('odds_win') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group col-lg-4">
						<label>Hai đội hoà</label>
						<input type="text" class="form-control{{ $errors->has('odds_draw') ? ' is-invalid' : '' }}" name="odds_draw" value="{{$match->odds_draw}}">
						@if ($errors->has('odds_draw'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('odds_draw') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group col-lg-4" >
						<label >Đội khách thắng</label>
						<input type="text"  class="form-control{{ $errors->has('odds_lose') ? ' is-invalid' : '' }}" name="odds_lose" value="{{$match->odds_lose}}">
						@if ($errors->has('odds_lose'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('odds_lose') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div style="margin-bottom: 20px">
					<button type="submit" class="btn btn-success" >Lưu thay đổi</button>
					<button type="reset" class="btn btn-success">Làm mới</button>
					<a href="{{url('')}}/admin/match/list"><button type="button" class=" btn btn-success" >Trở về</button></a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection