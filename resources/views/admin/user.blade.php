@extends('admin.header')
@section('title')Danh sách tài khoản @endsection
@section('sub-content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Danh sách các khách hàng</h2>
		</div>
	</div>
	<div class="row" style="margin-bottom: 30px">
		<div class="col-lg-12">
			<table id="user-table" class="table table-striped table-bordered rounded">
				<thead>
					<tr align="center">
						<th>ID tài khoản</th>
						<th >Tên tài khoản</th>
						<th >Họ tên khách hàng</th>
						<th >Số tiền trong tài khoản</th>
						<th >Số điện thoại</th>
						<th class="double-row">Email</th>
						<th >Số vé đã cược</th>
						<th> Tổng số tiền đã cược</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr align="center">
						<td>{{$user->id}}</td>
						<td>{{$user->username}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->coin}}</td>
						<td>{{$user->phone_number}}</td>
						<td>{{$user->email}}</td>
						<td >{{count($user->getBet)}}</td>
						@php
							$all=0;
							foreach ($user->getBet as $key => $value) {
								$all+=$value->coin;
							}
						@endphp
						<td>{{$all}} $APC</td>
					</tr>
					@endforeach		
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection