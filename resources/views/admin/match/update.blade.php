@extends('admin.header')
@section('title') Cập nhật kết quả @endsection
@section('sub-content')
<div class="container-fluid">
	<form action="admin/match/update/{{$match->id}}" method="POST">
		@csrf
		<div class="row">
			<div class="col-lg-12"> <h2 class="page-header">Cập nhật kết quả trận đấu có ID {{$match->id}}</h2></div>
			<div class="col-lg-4">
				<div>
					<img src="{{asset($match->getTeamHome->club_image)}}" alt="Ảnh lỗi" style="width: 250px;height: 250px;border-radius: 10%;object-fit: contain;display: block;margin: 0px auto;">
					<p align="center" style="font-size: 30px;font-weight: bold;">{{$match->getTeamHome->club_name}} </p>
				</div>
				<div style="margin-top: 30px;text-align: center;">
					<label>Đội 1 ghi bàn</label>
					<input type="number" name="home_score" step="1" style="font-size: 30px;text-align: center;" class="form-control{{ $errors->has('home_score') ? ' is-invalid' : '' }}" value="{{old('home_score')}}">
					@if ($errors->has('home_score'))
					<span class="invalid-feedback" role="alert" style="display:block;">
						<strong>{{ $errors->first('home_score') }}</strong>
					</span>
					@endif
				</div>
			</div>
			<div class="col-lg-4" align="center">
				<p style="text-align:center;">{{$match->league}} - {{$match->round}}</p>
				<p style="text-align:center;margin: 10px; font-size: 40px"> VS</p>
				<p style="text-align:center">Thời gian: {{Carbon::parse($match->start_time)->format('H:i d/m/Y')}}</p>
				<p style="text-align:center">đến {{Carbon::parse($match->end_time)->format('H:i d/m/Y')}}</p>
				<p style="text-align: center;margin:10px">Tỉ lệ cược</p>
				<ul style="list-style-type: none;display:inline;padding: 0px">
					<li style="display:inline;font-size:30px;margin:20px">{{$match->odds_win}}</li>
					<li style="display:inline;font-size:30px;margin:20px">{{$match->odds_draw}}</li>
					<li style="display:inline;font-size:30px;margin:20px">{{$match->odds_lose}}</li>
				</ul>
			</div>
			<div class="col-lg-4">
				<div >
					<img src="{{asset($match->getTeamAway->club_image)}}" alt="Ảnh lỗi" style="width: 250px;height: 250px;border-radius: 10%;object-fit: contain;display: block;margin: 0px auto;">
					<p align="center" style="font-size: 30px;font-weight: bold;">{{$match->getTeamAway->club_name}}</p>
				</div>
				<div style="margin-top: 30px;text-align: center;">
					<label>Đội 2 ghi bàn</label>
					<input type="number" name="away_score" step="1" style="font-size: 30px;text-align: center;" class="form-control{{ $errors->has('away_score') ? ' is-invalid' : '' }}" value="{{old('away_score')}}">
					@if ($errors->has('away_score'))
					<span class="invalid-feedback" role="alert" style="display:block;">
						<strong>{{ $errors->first('away_score') }}</strong>
					</span>
					@endif
				</div>
			</div>
		</div>
		<div style="margin-top: 30px">
			<ul class="two-button-center" >
				<li style="display: inline;">
					@if($match->is_done==false)
					<button class="btn btn-success" type="submit">Cập nhật kết quả trận đấu</button>
					@endif
				</li>
				<li style="display: inline;">
					<a href="{{url('')}}/admin/match/list">
						<button class="btn btn-success" type="button">Trở về</button>
					</a>
				</li>
			</ul>
		</div>
		@if(session('notify'))
		<div class="alert alert-success">
			{{session('notify')}}
		</div>
		@endif
	</form>
</div>
@endsection