@extends('admin.header')
@section('title')Danh sách đội bóng @endsection
@section('sub-content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header" >Danh sách đội bóng</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10">
			@if(session('notify'))
			<div class="alert alert-success">
				<strong>{{session('notify')}}</strong>
			</div>
			@endif
			<table id="club-table" class="table table-striped table-bordered">
				<thead>
					<tr align="center">
						<th>ID đội bóng</th>
						<th>Kí hiệu đội bóng</th>
						<th>Ảnh đội bóng</th>
						<th>Tên đội bóng</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach($all as $club)
					<tr align="center">
						<td>{{$club->id}}</td>
						<td>{{$club->club_sign}}</td>
						<td><img src="{{asset($club->club_image)}}" alt="Ảnh lỗi" style="width: 50px;height: 50px;border-radius: 10%;object-fit: contain"></td>
						<td>{{$club->club_name}}</td>
						<td style="text-align: center;">
							<i class="fas fa-edit"></i>
							<a href="{{url('')}}/admin/club/edit/{{$club->id}}" style="margin-right: 15px">Sửa</a>
							<i class="fas fa-trash-alt"></i>
							<form action="admin/club/del/{{$club->id}}" method="POST" style="display: inline;"
								class='form-deleted'>
								@csrf
								<button type="submit" class="button-like-link" style="color: red">Xoá</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<a href="{{url('')}}/admin/club/add"><button class="btn btn-success" style="margin: 30px 0 30px">Thêm đội bóng</button></a>
</div>
@endsection