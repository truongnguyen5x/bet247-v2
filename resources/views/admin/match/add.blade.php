@extends('admin.header')
@section('title') Thêm trận đấu @endsection
@section('sub-content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12"> <h2 class="page-header">Thêm trận đấu</h2></div>
		<div class="col-lg-9">
			<form action="admin/match/add" method="POST">
				@csrf
				@if(session('notify'))
				<div class="alert alert-success">
					<strong>{{session('notify')}}</strong>
				</div>
				@endif
				<div class="form-row" style="margin-bottom: 30px">
					<div class="form-group col-lg-6" >
						<label>Trạng thái công khai/ẩn</label>
						<select class="form-control" name="is_public">
							<option value="public"{{old('is_public')=='public'?' selected ': ''}}>Công khai</option>
							<option value="hidden"{{old('is_public')=='hidden'?' selected ': ''}}>Ẩn</option>
						</select>
					</div>
				</div>
				<div class="form-row" style="margin-bottom: 30px">
					<div class="form-group col-lg-6" >
						<label>Tên của giải đấu</label>
						<input class="form-control{{ $errors->has('league') ? ' is-invalid' : '' }}" type="text" name="league" value="{{old('league')}}">
						@if ($errors->has('league'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('league') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group col-lg-6" >
						<label>Vòng đấu</label>
						<input class="form-control{{ $errors->has('round') ? ' is-invalid' : '' }}" type="text" name="round" value="{{old('round')}}">
						@if ($errors->has('round'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('round') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-row" style="margin-bottom: 30px">
					<div class="form-group col-lg-6" >
						<label>Đội chủ nhà</label>
						<select class="form-control{{ $errors->has('team_away') ? ' is-invalid' : '' }}" name="team_home">
							@foreach($clubs as $club)
							<option value="{{$club->id}}" {{$club->id==old('team_home')?' selected ':''}}>ID:{{$club->id.'  '}}
								{{$club->club_name}}
							</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-lg-6" >
						<label >Đội khách</label>
						<select class="form-control{{ $errors->has('team_away') ? ' is-invalid' : '' }}" name="team_away">
							@foreach($clubs as $club)
							<option value="{{$club->id}}" {{$club->id==old('team_away')?' selected ':''}}>
								ID:{{$club->id.'  '}}
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
				<div class="form-row" style="margin-bottom: 30px">
					<div class="form-group col-lg-4" >
						<label >Thời gian bắt đầu</label>
						<input class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" type="datetime-local" name="start_time" style="margin-right: 40px" value="{{old('start_time')}}">
						@if ($errors->has('start_time'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('start_time') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group col-lg-4" >
						<label >Thời gian kết thúc</label>
						<input class="form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }}" type="datetime-local" name="end_time" style="margin-right: 40px" value="{{old('end_time')}}">
						@if ($errors->has('end_time'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('end_time') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group col-lg-4" >
						<label >Thời gian dừng nhận cá cược</label>
						<input class="form-control{{ $errors->has('time_close_bet') ? ' is-invalid' : '' }}" type="datetime-local" name="time_close_bet" style="margin-right: 40px" value="{{old('time_close_bet')}}">
						@if ($errors->has('time_close_bet'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('time_close_bet') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<label>Tỉ lệ cược </label>
				<div class="form-row" style="margin-bottom: 30px">
					<div class="form-group col-lg-4">
						<label >Đội chủ nhà thắng</label>
						<input type="text" class="form-control{{ $errors->has('odds_win') ? ' is-invalid' : '' }}" name="odds_win" value="{{old('odds_win')}}">
						@if ($errors->has('odds_win'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('odds_win') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group col-lg-4">
						<label>Hai đội hoà</label>
						<input type="text" class="form-control{{ $errors->has('odds_draw') ? ' is-invalid' : '' }}" name="odds_draw" value="{{old('odds_draw')}}">
						@if ($errors->has('odds_draw'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('odds_draw') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group col-lg-4" >
						<label >Đội khách thắng</label>
						<input type="text"  class="form-control{{ $errors->has('odds_lose') ? ' is-invalid' : '' }}" name="odds_lose" value="{{old('odds_lose')}}">
						@if ($errors->has('odds_lose'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('odds_lose') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div style="margin-bottom: 30px">
					<button type="submit" class="btn btn-success" >Thêm trận đấu</button>
					<button type="reset" class="btn btn-success">Làm mới</button>
					<a href="{{url('')}}/admin/match/list"><button type="button" class=" btn btn-success" >Trở về</button></a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection