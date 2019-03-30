@extends('index')
@section('title')Đăng ký tài khoản @endsection
@section('content')
<div id="wrapper" class="background-login" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <form class="form-login" style="margin-top: 0px" method="POST" action="register">
                    @csrf
                    <h1 align="center"><a href="{{url('')}}" title="Trang web cá cược bet247"> Đăng ký thành viên bet247.com</a>
                    </h1>
                    <br>
                    {{-- tên đăng nhập --}}
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input class="form-control{{$errors->has('username')?' is-invalid':''}}" name="username" type="text"  value="{{old('username')}}">
                        @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- email --}}
                    <div class="form-group">
                        <label>Địa chỉ email</label>
                        <input class="form-control{{$errors->has('email')?' is-invalid':''}}" name="email" type="email" value="{{old('email')}}">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- họ tên --}}
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control{{$errors->has('name')?' is-invalid':''}}" name="name" type="text" value="{{old('name')}}">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- số đt --}}
                    <div class="form-group">
                        <label >Số điện thoại </label>
                        <input class="form-control{{$errors->has('phone_number')?' is-invalid':''}}" name="phone_number" type="text" value="{{old('phone_number')}}">
                        @if ($errors->has('phone_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- mật khẩu --}}
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control{{$errors->has('password')?' is-invalid':''}}" name="password" type="password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                   {{--  nhập lại mk --}}
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input class="form-control{{$errors->has('password_confirm')?' is-invalid':''}}" name="password_confirm" type="password">
                        @if ($errors->has('password_confirm'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password_confirm') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                    {{-- nút bấm --}}
                    <div align="center">
                        <button class="btn btn-success" type="submit" style="display: inline">Đăng ký                        
                        </button>
                        <label> <a href="{{url('login')}}">Trang đăng nhập</a></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection