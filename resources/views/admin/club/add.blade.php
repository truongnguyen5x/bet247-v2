@extends('admin.header')
@section('title') Thêm đội bóng @endsection
@section('sub-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Thêm đội bóng</h2>
        </div>
        <div class="col-lg-7">
            @if(session('notify'))
            <div class="alert alert-success">
                <strong>{{session('notify')}}</strong>
            </div>
            @endif
            <form action="admin/club/add" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Tên đội bóng</label>
                    <input class="form-control{{ $errors->has('club_name') ? ' is-invalid' : '' }}" type="text" name="club_name" value="{{old('club_name')}}">
                    @if ($errors->has('club_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('club_name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label >Kí hiệu đội bóng</label>
                    <input class="form-control{{ $errors->has('club_sign') ? ' is-invalid' : '' }}" type="text" name="club_sign" value="{{old('club_sign')}}">
                    @if ($errors->has('club_sign'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('club_sign') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện</label>                  
                    <input type="file" class="form-control"  name="anh">
                </div>
                <div>
                    <ul class="two-button-center">
                        <li style="display: inline;"> <button type="submit" class="  btn btn-success" >Thêm đội bóng</button></li>
                        <li style="display: inline;"><button type="reset" class=" btn btn-success" >Reset</button></li>
                        <li style="display: inline;"><a href="{{url('')}}/admin/club/list"><button type="button" class=" btn btn-success">Trở về</button></a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection