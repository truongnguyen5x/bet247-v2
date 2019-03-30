@extends('index')
@section('title') Trang admin @endsection
@section('content')
<div id="wrapper">
    <nav class="background-gray navbar-50 navbar navbar-light">
        <a class="navbar-brand" href="{{url('')}}/header" ><img src="{{asset('image/icon.jfif')}}" class="rounded-circle"  height=30px width=30px >  bet247.com</a>
        <div class="ml-auto">
            @php
                $a=Auth::user();
            @endphp
            <span style="margin-right: 20px" id="datetime-label"></span>
            @if(Auth::check())
            <span style="margin-right: 20px">Ví {{$a->coin}} APC</span>
            @endif
            <span style="margin-right: 20px"><a href="{{url('')}}/logout" > Đăng xuất</a></span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-content">
        <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="left-sidebar">
            <p style="margin: 0px;line-height: 40px"><b id="label-admin-page"><a href="{{url('')}}">Tới trang người dùng</a></b></p>
            <ul id="menu-content" class="menu-content collapse hide">
                <li>
                    <a href="{{url('')}}/admin/match/list" >
                        <i class="fas fa-futbol"></i> Trận đấu
                    </a>
                </li>
                <li>
                    <a href="{{url('')}}/admin/club/list">
                        <i class="fas fa-users"></i> Đội bóng
                    </a>
                </li>
                <li>
                    <a href="{{url('')}}/admin/user/list">
                        <i class="fas fa-user"></i> Khách hàng
                    </a>
                </li>
                <li>
                    <a href="{{url('')}}/admin/bet/list">
                        <i class="fas fa-ticket-alt"></i> Danh sách đặt cược
                    </a>
                </li>
            </ul>
        </div>
    <div id="page-wrapper" >
        @yield('sub-content')
    </div>
</div>
@endsection