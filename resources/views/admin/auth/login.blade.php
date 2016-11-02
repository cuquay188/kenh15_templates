@extends('admin.auth.master')
@section('title','Login')
@section('content')
    <form action="{{route('admin.auth.login.post')}}" method="POST">
        @if(count($errors)>0)
            <div class="errors">
                @foreach($errors->all() as $error)
                    <div>* {{$error}}</div>
                @endforeach
            </div>
        @endif
        @if(Session::has('fail'))
            <div class="errors">
                * {{Session::get('fail')}}
            </div>
        @endif
        <div class="form-group">
            <input type="text" value="{{Session::has('new_username') ? Session::get('new_username'):''}}"
                   class="form-control" name="username" id="username" placeholder="User Name">
        </div>
        <div class="form-group">
            <input type="password" value="{{Session::has('new_password') ? Session::get('new_password'):''}}"
                   class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-group" style="display:none;">
            <input type="checkbox" name="remember" id="remember" disabled>
            <label for="remember" style="font-weight: normal">Remember</label>
        </div>
        <div class="form-group">
            <input type="hidden" value="{{Session::token()}}" name="_token">
            <button class="btn btn-primary" id="btn-login" type="submit">Login</button>
            <a class="btn" id="btn-login-fb" href="{{route('admin.user.login.redirectTo','facebook')}}"><i class="fa fa-facebook-square"></i></a>
            <a class="btn" id="btn-login-gm" href="{{route('admin.user.login.redirectTo','google')}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
           
        </div>
    </form>
@endsection